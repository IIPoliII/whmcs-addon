<?php

namespace MGModule\SSLCENTERWHMCS\eServices;

class ScriptService {

    const WEB_SERVER    = 'scripts/webServerType';
    const SAN_EMAILS    = 'scripts/sanApprovals';
    const ADMIN_SERVICE = 'scripts/adminService';
    const AUTO_FILL     = 'scripts/autoFill';
    const PRIVATE_KEY_FILL = 'scripts/privateKeyFill';
    const ORDER_TYPE_FILL = 'scripts/orderTypeFill';
    const OPTION_ERROR  = 'scripts/configOptionsError';
    const STEP_ONE_BASE = 'scripts/stepOneBase';
    const ORDER_TYPE    = 'scripts/orderType';
    const GENERATE_CSR_MODAL    = 'scripts/generateCsrModal';


    public static function getWebServerTypeSctipt($apiWebServersJSON) {
        $servertype = \MGModule\SSLCENTERWHMCS\eServices\FlashService::getFieldsMemory($_GET['cert'], 'servertype');
        if($servertype != '-1') {
            if (count($servertype) === 0) {
                $servertype = 0;
            }
        }
        if(!empty($_POST['servertype'])) {
            $servertype = $_POST['servertype'];
        }
        return TemplateService::buildTemplate(self::WEB_SERVER, [
                    'serverTypes'      => addslashes($apiWebServersJSON),
                    'selectedServerId' => $servertype,
        ]);
    }
    
    public static function getStepOneBaseScript($brand) {
        return TemplateService::buildTemplate(self::STEP_ONE_BASE, ['brand' => json_encode($brand)]);
    }
    public static function getOrderTypeScript($orderTypes, $fillVarsJSON) {
        return TemplateService::buildTemplate(self::ORDER_TYPE,[
                    'fillVars'          => addslashes($fillVarsJSON),
                    'orderTypes'        => json_encode($orderTypes)
        ]);
    }
    public static function getGenerateCsrModalScript($fillVarsJSON, $countriesForGenerateCsrForm, $vars = array()) {
        return TemplateService::buildTemplate(self::GENERATE_CSR_MODAL, [
                    'fillVars' => addslashes($fillVarsJSON),
                    'countries'=> json_encode($countriesForGenerateCsrForm),
                    'vars' => $vars
        ]);
    }    
    public static function getAutoFillPrivateKeyField($privateKey) {
        return TemplateService::buildTemplate(self::PRIVATE_KEY_FILL, ['privateKey' => $privateKey]);
    }
    public static function getAutoFillOrderTypeField($orderType) {
        return TemplateService::buildTemplate(self::ORDER_TYPE_FILL, ['orderType' => $orderType]);
    }
    public static function getAutoFillFieldsScript($fillVarsJSON) {
        return TemplateService::buildTemplate(self::AUTO_FILL, ['fillVars' => addslashes($fillVarsJSON)]);
    }

    public static function getSanEmailsScript($apiSanEmailsJSON, $fillVarsJSON = null, $brand = null, $disabledValidationMethods = array()) {
        return TemplateService::buildTemplate(self::SAN_EMAILS, ['sanEmails' => addslashes($apiSanEmailsJSON), 'fillVars' => addslashes($fillVarsJSON), 'brand' => addslashes($brand), 'disabledValidationMethods' => $disabledValidationMethods]);
    }

    public static function getAdminServiceScript($vars) {
        return TemplateService::buildTemplate(self::ADMIN_SERVICE, $vars);
    }
    
    public static function getConfigOptionErrorScript($error) {
        return TemplateService::buildTemplate(self::OPTION_ERROR, ['error' => $error]);
    }
}
