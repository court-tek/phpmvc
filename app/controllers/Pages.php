<?php
    class Pages extends Controller 
    {
        public function __construct()
        {
            $this->postModel = $this->model('Post');
        }

        public function index()
        {
            $this->view('pages/welcome', ['title' => 'Welcome']);
            // echo 'This is the index page';
        }

        public function new()
        {
            // echo 'This is the new page';
            $base_price_money = new \Square\Models\Money();
            $base_price_money->setAmount(1599);
            $base_price_money->setCurrency('USD');

            $order_line_item = new \Square\Models\OrderLineItem('1');
            $order_line_item->setName('New York Strip Steak');
            $order_line_item->setBasePriceMoney($base_price_money);

            $order_line_item_modifier = new \Square\Models\OrderLineItemModifier();
            $order_line_item_modifier->setCatalogObjectId('CHQX7Y4KY6N5KINJKZCFURPZ');

            $modifiers = [$order_line_item_modifier];
            $order_line_item_applied_discount = new \Square\Models\OrderLineItemAppliedDiscount('one-dollar-off');

            $applied_discounts = [$order_line_item_applied_discount];
            $order_line_item1 = new \Square\Models\OrderLineItem('2');
            $order_line_item1->setCatalogObjectId('BEMYCSMIJL46OCDV4KYIKXIB');
            $order_line_item1->setModifiers($modifiers);
            $order_line_item1->setAppliedDiscounts($applied_discounts);

            $line_items = [$order_line_item, $order_line_item1];
            $order_line_item_tax = new \Square\Models\OrderLineItemTax();
            $order_line_item_tax->setUid('state-sales-tax');
            $order_line_item_tax->setName('State Sales Tax');
            $order_line_item_tax->setPercentage('9');
            $order_line_item_tax->setScope('ORDER');

            $taxes = [$order_line_item_tax];
            $order_line_item_discount = new \Square\Models\OrderLineItemDiscount();
            $order_line_item_discount->setUid('labor-day-sale');
            $order_line_item_discount->setName('Labor Day Sale');
            $order_line_item_discount->setPercentage('5');
            $order_line_item_discount->setScope('ORDER');

            $order_line_item_discount1 = new \Square\Models\OrderLineItemDiscount();
            $order_line_item_discount1->setUid('membership-discount');
            $order_line_item_discount1->setCatalogObjectId('DB7L55ZH2BGWI4H23ULIWOQ7');
            $order_line_item_discount1->setScope('ORDER');

            $amount_money = new \Square\Models\Money();
            $amount_money->setAmount(100);
            $amount_money->setCurrency('USD');

            $order_line_item_discount2 = new \Square\Models\OrderLineItemDiscount();
            $order_line_item_discount2->setUid('one-dollar-off');
            $order_line_item_discount2->setName('Sale - $1.00 off');
            $order_line_item_discount2->setAmountMoney($amount_money);
            $order_line_item_discount2->setScope('LINE_ITEM');

            $discounts = [
                $order_line_item_discount,
                $order_line_item_discount1,
                $order_line_item_discount2
            ];
            $order = new \Square\Models\Order('057P5VYJ4A5X1');
            $order->setReferenceId('my-order-001');
            $order->setLineItems($line_items);
            $order->setTaxes($taxes);
            $order->setDiscounts($discounts);

            $body = new \Square\Models\CreateOrderRequest();
            $body->setOrder($order);
            $body->setIdempotencyKey('8193148c-9586-11e6-99f9-28cfe92138cf');

            $api_response = $client->getOrdersApi()->createOrder($body);

            if ($api_response->isSuccess()) {
                $result = $api_response->getResult();
            } else {
                $errors = $api_response->getErrors();
            }
        }

        public function show()
        {
            echo 'This is the show page';
        }

        public function edit()
        {
            echo 'This is the edit page';
        }

        public function about() 
        {
            echo 'This page is about us, hello. Your number is ';
        }
    }