<?php

namespace Como\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $objs = $em->getRepository('ComoAccommodationBundle:Product')->getProductList();

        return $this->render('ComoFrontBundle:Default:index.html.twig', array('objs' => $objs));
    }

    public function detailsAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $obj = $em->getRepository('ComoAccommodationBundle:Product')->find($id);
        $txaData = array();
        $prodExt = "";
        foreach ($obj->getProductexternals() as $prodExternal)
        {
            $prodExt.= '<Provider short_name="' . $prodExternal->getProviderShortName() . '" xmlns="http://www.v3leisure.com/Schemas/CABS/1.0/CABS_Common.xsd" />';
        }
        if ($prodExt)
        {

            $Tdata = '<?xml version="1.0"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
<soap12:Body>
<CABS_ProviderCalendar_RQ xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="http://www.v3leisure.com/Schemas/CABS/1.0/CABS_ProviderCalendar.xsd">
  <Channels>
    <DistributionChannel id="Test_V3_Offload" key="60E0533B-6E38-4779-A7D7-0D82BF824C55" xmlns="http://www.v3leisure.com/Schemas/CABS/1.0/CABS_Common.xsd" />
  </Channels>
  <Providers>
    ' . $prodExt . '
    <Provider short_name="highmountainsmotorinn" xmlns="http://www.v3leisure.com/Schemas/CABS/1.0/CABS_Common.xsd" />
  </Providers>
  <Query cache="On">
    <IndustryCategory xmlns="http://www.v3leisure.com/Schemas/CABS/1.0/CABS_Common.xsd">Accommodation</IndustryCategory>
    <Criteria start_date="2013-01-19" days="7" xmlns="http://www.v3leisure.com/Schemas/CABS/1.0/CABS_Common.xsd" />
  </Query>
  <Response product_calendar="true" />
</CABS_ProviderCalendar_RQ>
</soap12:Body>
</soap12:Envelope>
';
            $url = "http://www.au.v3travel.com/CABS.WebServices/SearchService.asmx?WSDL";

            $headers = array(
                'Content-Type: application/soap+xml; charset=\"utf-8\"',
                'POST /CABS.WebServices/SearchService.asmx HTTP/1.1',
                'Host: www.au.v3travel.com',
                'Content-Length: ' . strlen($Tdata),
                'Accept: text/xml',
                'Cache-Control: no-cache',
                'Pragma: no-cache',
                'SOAPAction: http://www.v3leisure.com/CABS/V3Leisure.CABS.Services.WebServices/CalendarSearch'
            );


            $soap_do = curl_init();
            curl_setopt($soap_do, CURLOPT_URL, $url);
            curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($soap_do, CURLOPT_POST, true);
            curl_setopt($soap_do, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($soap_do, CURLOPT_POSTFIELDS, $Tdata);

            $result = curl_exec($soap_do);
            $err = curl_error($soap_do);
            
            $xml = simplexml_load_string($result);
            $xml->registerXPathNamespace('TXA', 'http://www.v3leisure.com/Schemas/CABS/1.0/CABS_ProviderCalendar_RS.xsd');
            $channels = $xml->xpath('//TXA:Channels');

            if ($channels)
            {
                foreach ($channels as $channel)
                {
                    foreach($channel->Channel->Providers->Provider->Products->Product as $product)
                    {
                        $product = json_decode( json_encode($product) , 1);
                        foreach($product as $attr)
                        {
                           $txaData[] = $attr;
                        }
                        
                    }
                    
                }
            }
        }
//        echo '<pre>';
//        print_r($txaData); exit;
        return $this->render('ComoFrontBundle:Default:details.html.twig', array('obj' => $obj,'txaData' => $txaData));
    }

}
