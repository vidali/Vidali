<?php
/***********************************************************************
 * LeafWork 2.0
 * ---------------------------------------------------------------------
 * File: agents.php
 * Author: Moisés Lodeiro <moises.lodeiro@gmail.com>
 * Licence: GPLv3
 * ---------------------------------------------------------------------
 * En el archivo agents.php encontramos una lista de agentes potencialmente
 * dañinos que, por norma general, se usan para encontrar vulnerabilidades en
 * nuestro servidor y/o web. Es recomendable mantener la lista entera establecida
 * a "1" pues eso filtrará los agentes malignos. No obstante esto no ofrece una
 * protección total pues los agentes, enviados por los programas pueden cambiar
 * y simular que se trata de un usuario normal.
 * ---------------------------------------------------------------------
 * Dependencias: Ninguna.
 * ---------------------------------------------------------------------
 **********************************************************************/

// Las opciones para cada configuración pueden bien ser 1 ( activado ) ó 0 ( desactivado )
// Se recomienda ALTAMENTE mantener todo en activado. */

$agents['Absinthe'] = 1;
$agents['Acunetix'] = 1;
$agents['Amap'] = 1;
$agents['Arachni'] = 1;
$agents['Asp-Audit'] = 1;
$agents['Audit'] = 1;
$agents['AutoGetColumn'] = 1;
$agents['Brute'] = 1;
$agents['BURP'] = 1;
$agents['Cisco-torch'] = 1;
$agents['Crawler'] = 1;
$agents['CustomCrawler'] = 1;
$agents['DAV.pm'] = 1;
$agents['DavTest'] = 1;
$agents['DirBuster'] = 1;
$agents['DirBuster'] = 1;
$agents['DominoHunter'] = 1;
$agents['DotDotPwn'] = 1;
$agents['DotDotPwn'] = 1;
$agents['Enumiax'] = 1;
$agents['Force'] = 1;
$agents['Grabber'] = 1;
$agents['Grendel'] = 1;
$agents['HZZP'] = 1;
$agents['Havij'] = 1;
$agents['Hmap'] = 1;
$agents['Httprecon'] = 1;
$agents['Inject'] = 1;
$agents['Injection'] = 1;
$agents['Inspathx'] = 1;
$agents['Metasploit'] = 1;
$agents['Modbus'] = 1;
$agents['MySqlatOr'] = 1;
$agents['Mysqloit'] = 1;
$agents['Mysqloit'] = 1;
$agents['Nemesis'] = 1;
$agents['Netsparker'] = 1;
$agents['Nikto'] = 1;
$agents['Nmap'] = 1;
$agents['OpenVAS'] = 1;
$agents['Python'] = 1;
$agents['SQLBrute'] = 1;
$agents['SQLninja'] = 1;
$agents['Sipp'] = 1;
$agents['Sipvicious'] = 1;
$agents['Skipfish'] = 1;
$agents['SolarWinds'] = 1;
$agents['Springenwerk'] = 1;
$agents['WITOOL'] = 1;
$agents['WafWoof'] = 1;
$agents['Wapiti'] = 1;
$agents['Watchfire'] = 1;
$agents['Wmap'] = 1;
$agents['ZmEu'] = 1;
$agents['bsqlbf'] = 1;
$agents['burp'] = 1;
$agents['core-project'] = 1;
$agents['crimscanner'] = 1;
$agents['dragostea'] = 1;
$agents['eyeBeam'] = 1;
$agents['friendly-scanner'] = 1;
$agents['get-minimal'] = 1;
$agents['hacker'] = 1;
$agents['inspath'] = 1;
$agents['myscan'] = 1;
$agents['nmap'] = 1;
$agents['pangolin'] = 1;
$agents['paros'] = 1;
$agents['pavuk'] = 1;
$agents['pymills-spider'] = 1;
$agents['sqlmap'] = 1;
$agents['sql power'] = 1;
$agents['sundayddr'] = 1;
$agents['superscan'] = 1;
$agents['uil2pn'] = 1;
$agents['w3af'] = 1;
$agents['webtrends'] = 1;
$agents['xmas'] = 1;

?>
