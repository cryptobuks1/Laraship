<?php

/**
 * SecurionPay Fetch Invoice Request.
 */

namespace Corals\Modules\Payment\SecurionPay\Message;

/**
 * SecurionPay Fetch Invoice Request.
 *
 * @link https://securionpay.com/docs/api#retrieve_invoice
 */
class FetchInvoiceRequest extends AbstractRequest
{
    /**
     * Get the invoice reference.
     *
     * @return string
     */
    public function getInvoiceReference()
    {
        return $this->getParameter('invoiceReference');
    }

    /**
     * Set the set invoice reference.
     *
     * @return FetchInvoiceRequest provides a fluent interface.
     */
    public function setInvoiceReference($value)
    {
        return $this->setParameter('invoiceReference', $value);
    }

    public function getData()
    {
        $this->validate('invoiceReference');
        $data = array();

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/invoices/' . $this->getInvoiceReference();
    }

    public function getHttpMethod()
    {
        return 'GET';
    }
}
