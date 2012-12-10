<?php

class defaultComponents extends sfComponents 
{
  public function executeTopNav()
  {
    
  }
  
  public function executeFooter()
  {
    
  }
  
  public function executeCategoriesNav()
  {
    $this->categories = CategoryTable::getInstance()
            ->findByDql('is_active=1 ORDER BY name');
  }
  
  /**
   * Show google large dynamic Google map.
   */
  public function executeGoogleMap(sfWebRequest $request)
  {
    // GMap information
//    $bLat = $request->getParameter('latitude', 0);
    $bLat = $this->latitude ? $this->latitude : 0;
    $bLong = $this->longitude ? $this->longitude : 0;
    $bAddress = $this->address ? $this->address : '';
    $this->gMap = new GMap();
    if($bLat && $bLong){
        // Get gmap by longitude & latitude
        $this->gMap->setCenter($bLat, $bLong);
        $this->gMap->addMarker(new GMapMarker($bLat, $bLong));
    }else if($bAddress){
        // Create geocoded address
        $geocoded_address = new GMapGeocodedAddress($sample_address);
        $geocoded_address->geocode($this->gMap->getGMapClient());
        // Center the map on geocoded address
        $this->gMap->setCenter($geocoded_address->getLat(), $geocoded_address->getLng());
        // Add marker on geocoded address
        $this->gMap->addMarker(
          new GMapMarker($geocoded_address->getLat(), $geocoded_address->getLng())
        );
    }
    $mapZoom = sfConfig::get('app_google_maps_api_default_zoom_level', 10);
    $this->gMap->setZoom($mapZoom); 
  }
}