<?php
return [
    'account_register' => [
        'subject' => 'Account Registered Successfully',
        'view' => 'emails.user.account_register',
    ],
    'contact' => [
        'subject' => 'New Contact Enquiry',
        'view' => 'emails.contact',
    ],
    'email_verification' => [
        'subject' => 'Please Verify Your Email',
        'view' => 'emails.user.email_verification',
    ],
    'forgot_password' => [
        'subject' => 'Reset Password Request',
        'view' => 'emails.user.forgot_password',
    ],
    'order_confirmation' => [
        'subject' => 'Your Order is Confirmed!',
        'view' => 'emails.order.order_confirmation',
    ],
    'order_delivered' => [
        'subject' => 'Order Delivered',
        'view' => 'emails.order.order_delivered',
    ],
    'order_place' => [
        'subject' => 'Order Placed Successfully',
        'view' => 'emails.order.order_place',
    ],
    'order_shipped' => [
        'subject' => 'Order Shipped',
        'view' => 'emails.order.order_shipped',
    ],
    'password_reset' => [
        'subject' => 'Your Password has been Reset',
        'view' => 'emails.user.password_reset',
    ],
    'payment_success' => [
        'subject' => 'Payment Successful',
        'view' => 'emails.order.payment_success',
    ],
    'user_registered' => [
        'subject' => 'User Registered',
        'view' => 'emails.user.user_registered',
    ],
];
