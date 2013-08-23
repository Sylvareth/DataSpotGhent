<?php

class DatasetController extends Zend_Controller_Action
{
    public function init()
    {
        // Disable the main layout renderer
        $this->_helper->layout->disableLayout();
        // Do not even attempt to render a view
        $this->_helper->viewRenderer->setNoRender(true);
    }
    
    public function indexAction()
    {
        // 
    }
    
    // GET PARKINGS FROM JSON URL AND SAVE THEM TO DATABASE
    public function updateparkingsAction()
    {
        $JsonUrl = file_get_contents('http://data.appsforghent.be/poi/parkings.json');
        $result = Zend_Json::decode($JsonUrl);
        $createddate = date('Y-m-d H:i:s');
        
        $mapper = new Application_Model_ParkingMapper();
        
        if ($mapper->truncate()) {
            foreach($result['parkings'] as $data)
            {
                $parking = new Application_Model_Parking($data);
                $parking->setCreateddate($createddate);

                $mapper = new Application_Model_ParkingMapper();
                $mapper->saveParkings($parking);

            }
        }
        
        return $this->redirect('index');
    }
    
    // GET STATIONS FROM JSON URL AND SAVE THEM TO DATABASE
    public function updatestationsAction()
    {
        $JsonUrl = file_get_contents('http://data.appsforghent.be/poi/stationsgent.json');
        $result = Zend_Json::decode($JsonUrl);
        $modifieddate = date('Y-m-d H:i:s');
        
        $mapper = new Application_Model_StationMapper();
        if ($mapper->truncate()) {
            
            foreach($result['stationsgent'] as $data)
            {
                $station = new Application_Model_Station($data);
                $station->setModifiedDate($modifieddate);

                $mapper = new Application_Model_StationMapper();
                $mapper->saveStations($station);
            }
        }
        
        return $this->redirect('index');
    }
    
    // GET BIOSCOPEN FROM JSON URL AND SAVE THEM TO DATABASE
    public function updatebioscopenAction()
    {
        $JsonUrl = file_get_contents('http://data.appsforghent.be/poi/bioscopen.json');
        $result = Zend_Json::decode($JsonUrl);
        $modifieddate = date('Y-m-d H:i:s');
        
        // Zend_Debug::dump($result);
        $mapper = new Application_Model_BioscoopMapper();
        if ($mapper->truncate()) {
            
            foreach($result['bioscopen'] as $data)
            {
                $bioscoop = new Application_Model_Bioscoop($data);
                $bioscoop->setModifiedDate($modifieddate);

                $mapper = new Application_Model_BioscoopMapper();
                $mapper->saveBioscopen($bioscoop);
            }
        }
        
        return $this->redirect('index');
    }
    
    // GET BIBLIOTHEKEN FROM JSON URL AND SAVE THEM TO DATABASE
    public function updatebibliothekenAction()
    {
        $JsonUrl = file_get_contents('http://data.appsforghent.be/poi/bibliotheken.json');
        $result = Zend_Json::decode($JsonUrl);
        $modifieddate = date('Y-m-d H:i:s');
        
        $mapper = new Application_Model_BibliotheekMapper();
        if ($mapper->truncate()) {
            
            foreach($result['bibliotheken'] as $data)
            {
                $bibliotheek = new Application_Model_Bibliotheek($data);
                $bibliotheek->setModifiedDate($modifieddate);

                $mapper = new Application_Model_BibliotheekMapper();
                $mapper->saveBibliotheken($bibliotheek);
            }
        }
        
        return $this->redirect('index');
    }
    
    // GET BASISSCHOLEN FROM JSON URL AND SAVE THEM TO DATABASE
    public function updatebasisscholenAction()
    {
        $JsonUrl = file_get_contents('http://data.appsforghent.be/poi/basisscholen.json');
        $result = Zend_Json::decode($JsonUrl);
        $modifieddate = date('Y-m-d H:i:s');
        
        $mapper = new Application_Model_BasisschoolMapper();
        if ($mapper->truncate()) {
            
            foreach($result['basisscholen'] as $data)
            {
                $basisschool = new Application_Model_Basisschool($data);
                $basisschool->setModifiedDate($modifieddate);

                $mapper = new Application_Model_BasisschoolMapper();
                $mapper->saveBasisscholen($basisschool);
            }
        }
        
        return $this->redirect('index');
    }
    
    // GET SECUNDAIRESCHOLEN FROM JSON URL AND SAVE THEM TO DATABASE
    public function updatesecundairescholenAction()
    {
        $JsonUrl = file_get_contents('http://data.appsforghent.be/poi/secundairescholen.json');
        $result = Zend_Json::decode($JsonUrl);
        $modifieddate = date('Y-m-d H:i:s');
        
        $mapper = new Application_Model_SecundaireschoolMapper();
        if ($mapper->truncate()) {
            
            foreach($result['secundairescholen'] as $data)
            {
                $secundaireschool = new Application_Model_Secundaireschool($data);
                $secundaireschool->setModifiedDate($modifieddate);

                $mapper = new Application_Model_SecundaireschoolMapper();
                $mapper->saveSecundairescholen($secundaireschool);
            }
        }
        
        return $this->redirect('index');
    }
    
    // GET ZIEKENHUIZEN FROM JSON URL AND SAVE THEM TO DATABASE
    public function updateziekenhuizenAction()
    {
        $JsonUrl = file_get_contents('http://data.appsforghent.be/poi/ziekenhuizen.json');
        $result = Zend_Json::decode($JsonUrl);
        $modifieddate = date('Y-m-d H:i:s');
        
        $mapper = new Application_Model_ZiekenhuisMapper();
        if ($mapper->truncate()) {
            
            foreach($result['ziekenhuizen'] as $data)
            {
                $ziekenhuis = new Application_Model_Ziekenhuis($data);
                $ziekenhuis->setModifiedDate($modifieddate);

                $mapper = new Application_Model_ZiekenhuisMapper();
                $mapper->saveZiekenhuizen($ziekenhuis);
            }
        }
        
        return $this->redirect('index');
    }
    
    // GET APOTHEKEN FROM JSON URL AND SAVE THEM TO DATABASE
    public function updateapothekenAction()
    {
        $JsonUrl = file_get_contents('http://data.appsforghent.be/poi/apotheken.json');
        $result = Zend_Json::decode($JsonUrl);
        $modifieddate = date('Y-m-d H:i:s');
        
        $mapper = new Application_Model_ApotheekMapper();
        if ($mapper->truncate()) {
            
            foreach($result['apotheken'] as $data)
            {
                $apotheek = new Application_Model_Apotheek($data);
                $apotheek->setModifiedDate($modifieddate);

                $mapper = new Application_Model_ApotheekMapper();
                $mapper->saveApotheken($apotheek);
            }
        }
        
        return $this->redirect('index');
    }
    
    // GET DIERENARTSEN FROM JSON URL AND SAVE THEM TO DATABASE
    public function updatedierenartsenAction()
    {
        $JsonUrl = file_get_contents('http://data.appsforghent.be/poi/dierenartsen.json');
        $result = Zend_Json::decode($JsonUrl);
        $modifieddate = date('Y-m-d H:i:s');
        
        $mapper = new Application_Model_DierenartsMapper();
        if ($mapper->truncate()) {
            
            foreach($result['dierenartsen'] as $data)
            {
                $dierenarts = new Application_Model_Dierenarts($data);
                $dierenarts->setModifiedDate($modifieddate);

                $mapper = new Application_Model_DierenartsMapper();
                $mapper->saveDierenartsen($dierenarts);
            }
        }
        
        return $this->redirect('index');
    }
    
    // GET HUISARTSEN FROM JSON URL AND SAVE THEM TO DATABASE
    public function updatehuisartsenAction()
    {
        $JsonUrl = file_get_contents('http://data.appsforghent.be/poi/huisartsen.json');
        $result = Zend_Json::decode($JsonUrl);
        $modifieddate = date('Y-m-d H:i:s');
        
        $mapper = new Application_Model_HuisartsMapper();
        if ($mapper->truncate()) {
            
            foreach($result['huisartsen'] as $data)
            {
                $huisarts = new Application_Model_Huisarts($data);
                $huisarts->setModifiedDate($modifieddate);

                $mapper = new Application_Model_HuisartsMapper();
                $mapper->saveHuisartsen($huisarts);
            }
        }
        
        return $this->redirect('index');
    }
    
    // ENCODE JSON FROM DATABASE FOR JAVASCRIPT USAGE
    public function parkingsAction()
    {
        $mapper = new Application_Model_ParkingMapper();
        echo Zend_Json::encode($mapper->fetchAll());
        $this->getResponse()->setHeader('Content-type', 'applications/json');
        exit();
    }
    
    public function stationsAction()
    {
        $mapper = new Application_Model_StationMapper();
        echo Zend_Json::encode($mapper->fetchAll());
        $this->getResponse()->setHeader('Content-type', 'applications/json');
        exit();
    }
    
    public function bioscopenAction()
    {
        $mapper = new Application_Model_BioscoopMapper();
        echo Zend_Json::encode($mapper->fetchAll());
        $this->getResponse()->setHeader('Content-type', 'applications/json');
        exit();
    }
    
    public function bibliothekenAction()
    {
        $mapper = new Application_Model_BibliotheekMapper();
        echo Zend_Json::encode($mapper->fetchAll());
        $this->getResponse()->setHeader('Content-type', 'applications/json');
        exit();
    }
    
    public function basisscholenAction()
    {
        $mapper = new Application_Model_BasisschoolMapper();
        echo Zend_Json::encode($mapper->fetchAll());
        $this->getResponse()->setHeader('Content-type', 'applications/json');
        exit();
    }
    
    public function secundairescholenAction()
    {
        $mapper = new Application_Model_SecundaireschoolMapper();
        echo Zend_Json::encode($mapper->fetchAll());
        $this->getResponse()->setHeader('Content-type', 'applications/json');
        exit();
    }
    
    public function ziekenhuizenAction()
    {
        $mapper = new Application_Model_ZiekenhuisMapper();
        echo Zend_Json::encode($mapper->fetchAll());
        $this->getResponse()->setHeader('Content-type', 'applications/json');
        exit();
    }
    
    public function apothekenAction()
    {
        $mapper = new Application_Model_ApotheekMapper();
        echo Zend_Json::encode($mapper->fetchAll());
        $this->getResponse()->setHeader('Content-type', 'applications/json');
        exit();
    }
    
    public function dierenartsenAction()
    {
        $mapper = new Application_Model_DierenartsMapper();
        echo Zend_Json::encode($mapper->fetchAll());
        $this->getResponse()->setHeader('Content-type', 'applications/json');
        exit();
    }
    
    public function huisartsenAction()
    {
        $mapper = new Application_Model_HuisartsMapper();
        echo Zend_Json::encode($mapper->fetchAll());
        $this->getResponse()->setHeader('Content-type', 'applications/json');
        exit();
    }
    
}