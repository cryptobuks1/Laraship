<?php

/**
 * SecurionPay Fetch Subscription Request.
 */

namespace Corals\Modules\Payment\SecurionPay\Message;

/**
 * SecurionPay Fetch Subscription Request.
 *
 * @link https://securionpay.com/docs/api#retrieve_subscription
 */
class FetchSubscriptionRequest extends AbstractRequest
{
    /**
     * Get the subscription reference.
     *
     * @return string
     */
    public function getSubscriptionReference()
    {
        return $this->getParameter('subscriptionReference');
    }

    /**
     * Set the subscription reference.
     *
     * @param $value
     * @return \Corals\Modules\Payment\Common\Message\AbstractRequest|FetchSubscriptionRequest
     */
    public function setSubscriptionReference($value)
    {
        return $this->setParameter('subscriptionReference', $value);
    }

    public function getData()
    {
        $this->validate('customerReference', 'subscriptionReference');

        return array();
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/customers/' . $this->getCustomerReference()
            . '/subscriptions/' . $this->getSubscriptionReference();
    }

    public function getHttpMethod()
    {
        return 'GET';
    }
}
