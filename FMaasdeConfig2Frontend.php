<?php
namespace FMaasdeConfig2Frontend;
use Shopware\Components\Plugin\Context\ActivateContext;
use Shopware\Components\Plugin\Context\DeactivateContext;
class FMaasdeConfig2Frontend extends \Shopware\Components\Plugin
{
    public function activate(ActivateContext $context)
    {
        $context->scheduleClearCache(ActivateContext::CACHE_LIST_DEFAULT);
    }

    public function deactivate(DeactivateContext $context)
    {
        $context->scheduleClearCache(DeactivateContext::CACHE_LIST_DEFAULT);
    }

    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatchSecure_Frontend' => 'onFrontend'
        ];
    }

    public function onFrontend(\Enlight_Event_EventArgs $args)
    {
        $controller = $args->get('subject');
        $view = $controller->View();

        $pluginvalue = Shopware()->Config()->getByNamespace('FMaasdeConfig2Frontend', 'pluginvalue');
        $view->assign('pluginvalue', $pluginvalue);

    }

}