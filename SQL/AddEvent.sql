INSERT INTO `oc_event` (`code`, `trigger`, `action`, `status`, `sort_order`) VALUES
       ('shipping_disablerate', 'catalog/controller/checkout/shipping_method/after', 'event/shippingrate/disablerate', 1, 0);
