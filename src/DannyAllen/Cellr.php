<?php

namespace DannyAllen;

Class Cellr{

    public $download = true;
    public $filename = 'myspreadsheet.csv';

    private $output = false;

    /**
     * Public method __construct
     *
     * Checks if there is an array set, and then puts them into key=>value pairs.
     *
     * @param $arr The array of values set by the user for use in the object.
     */
    
        public function __construct($arr = false){
            //check for array and that it has a value
            if(is_array($arr) && count($arr)>0){
                //loop through each array and set a param=>value for each
                foreach($arr as $param => $value){
                    $this->$param = $value;
                }
            }

            $this->init();
        }


    /**
     * init
     *
     * Opens the file and sets the appropriate headers.
     */
    
        private function init(){

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