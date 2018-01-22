<?php
/** set your paypal credential **/

$config['client_id'] = 'ARA9QRI-4tmYe8zdZHuBjvswcx58rkJcKVIaNWshmOhsK8pQGsuMpWAwQq4wvnqTXRCIeGk1dsyDHxKI';
$config['secret'] = 'EFHOx_ZvAo_iFN-81eZjqosWJzr_-hLGhOgyVCvJEWYqYG0lYKH0kA0LqJe7o77unQuJTGjH4G3QvD-s';
//martiantechnologies16-facilitator@gmail.com

/**
 * SDK configuration
 */
/**
 * Available option 'sandbox' or 'live'
 */
$config['settings'] = array(

    'mode' => 'sandbox',
    /**
     * Specify the max request time in seconds
     */
    'http.ConnectionTimeOut' => 1000,
    /**
     * Whether want to log to a file
     */
    'log.LogEnabled' => true,
    /**
     * Specify the file that want to write on
     */
    'log.FileName' => 'application/logs/paypal.log',
    /**
     * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
     *
     * Logging is most verbose in the 'FINE' level and decreases as you
     * proceed towards ERROR
     */
    'log.LogLevel' => 'FINE'
);
