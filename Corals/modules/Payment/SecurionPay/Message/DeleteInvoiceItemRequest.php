<?php

/**
 * SecurionPay Delete Invoice Item Request.
 */

namespace Corals\Modules\Payment\SecurionPay\Message;

/**
 * SecurionPay Delete Invoice Item Request.
 *
 * @link https://securionpay.com/docs/api#delete_invoiceitem
 */
class DeleteInvoiceItemRequest extends AbstractRequest
{
    /**
     * Get the invoice-item reference.
     *
     * @return string
     */
    public function getInvoiceItemReference()
    {
        return $this->getParameter('invoiceItemReference');
    }

    /**
     * Set the set invoice-item reference.
     *
     * @return DeleteInvoiceItemRequest provides a fluent interface.
     */
    public function setInvoiceItemReference($value)
    {
        return $this->setParameter('invoiceItemReference', $value);
    }

    public function getData()
    {
        $this->validate('invoiceItemReference');
        $data = array();

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/invoiceitems/' . $this->getInvoiceItemReference();
    }

    public function getHttpMethod()
    {
        return 'DELETE';
    }
}
