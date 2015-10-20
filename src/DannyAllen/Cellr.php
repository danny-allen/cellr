<?php

namespace DannyAllen;

Class Cellr{

    public $download = true;
    public $filename = 'spreadsheet.csv';
    private $_output = false;

    /**
     * Public method __construct
     *
     * Runs init method.
     * 
     * @param array $data Values to add to the CSV.
     */
    
        public function __construct($data = array()){

            //set up the CSV
            $this->_init();

            //add any initial data.
            if(count($data) > 0){
                foreach($data as $row){
                    $this->addRow($row);
                }
            }
        }


    /**
     * init
     *
     * Opens the file and sets the appropriate headers.
     */
    
        private function _init(){

            $this->_output = fopen("php://output", "w");

            //if we're downloading set headers
            if($this->download){
                header("Content-type: text/csv");
                header("Content-Disposition: attachment; filename=".$this->filename);
                header("Pragma: no-cache");
                header("Expires: 0");
            }
        }


    /**
     * addRow
     *
     * Adds a row to the CSV after converting its values to UTF8.
     * 
     * @param array $arr The array to add to the CSV
     */
    
        public function addRow(array $arr){

            //utf8 decode the array
            $arr = array_map('utf8_decode', array_values($arr));

            //add the array/row to the csv
            fputcsv($this->_output, $arr);
        }


    /**
     * close
     *
     * Close the file.
     * 
     * @return [type] [description]
     */
        
        public function close(){

            fclose($this->_output);
        }

    
    }

?>