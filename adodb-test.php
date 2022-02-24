<?php

$MM_Cnn_STRING = "dsn=...;uid=...;pwd=...;";

$conn = new com("ADODB.Connection");
$conn->Open($MM_Cnn_STRING);

$cmd = new com("ADODB.Command");
$cmd->ActiveConnection = $conn;

//even though com.autoregister_typelib is set to true in php.ini, we'll need to pull in this library for the ad* constants used below
com_load_typelib("Microsoft ActiveX Data Objects 6.0 Library");

$cmd->CommandType = adCmdStoredProc;
$cmd->CommandText = "spInsertDocument";
$cmd->Parameters->Append( $cmd->CreateParameter("@claimId", adInteger, adParamInput, 80, 141622) );
$cmd->Parameters->Append( $cmd->CreateParameter("@docType", adVarChar, adParamInput, 500, "last test for real") );
$cmd->Parameters->Append( $cmd->CreateParameter("@docName", adVarChar, adParamInput, 500, "really") );
$cmd->Parameters->Append( $cmd->CreateParameter("@docPath", adVarChar, adParamInput, 500,"X:\\files") );
$cmd->Parameters->Append( $cmd->CreateParameter("@docUrl", adVarChar, adParamInput ,500,"K:\\files") );

date_default_timezone_set('Canada/Eastern');
$datetime_variable = new DateTime();
$datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i A'); //example accepted value: 2022-02-24 12:34:56 PM

$cmd->Parameters->Append( $cmd->CreateParameter("@CreatedDate", adVarChar, adParamInput, 500 , $datetime_formatted) );
$cmd->Parameters->Append( $cmd->CreateParameter("@visible",adTinyInt, adParamInput,1, 1) );

$cmd->Execute();
$conn->Close();

?>