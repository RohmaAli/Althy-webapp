@extends('layouts.web', ['hasConsumer' => $hasConsumer, 'menuCategories' => $menuCategories, 'consumer' => $consumer])
@section('content')

<div class="breadcrumbs-area breadcrumb-bg ptb-50">
    <div class="container">
        <div class="breadcrumbs text-center">
            <h2 class="breadcrumb-title">Return Policy</h2>
            <ul>
                <li>
                    <a class="active" href="{{ route('home') }}">Home</a>
                </li>
                <li>Return Policy</li>
            </ul>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<!-- shopping-cart-area start -->
<div class="cart-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12
                col-xs-12">
                <p><span style="font-weight: 400;">We do our best to make sure everything works perfectly, but if you find that any of our products are faulty within 3 days from purchase, we will issue a voucher of that amount. Please read the conditions for return and refund given below.</span><span style="font-weight: 400;"><br /></span><span style="font-weight: 400;">Many small technical issues can be resolved from the user manual given with the products, however if the issue persists, please call our helpline, and we will be happy to guide you in the right direction.</span><span style="font-weight: 400;"><br /></span><span style="font-weight: 400;">We will also guide you to the relevant warranty center in your area, for trouble shooter tips and other small queries.</span></p>
                <p><span style="font-weight: 400;">All items we supply are required to comply with the contract that Althy enters into with you when you place an order. If they don&rsquo;t, you have the following rights in addition to your legal rights:</span></p>
                <p><span style="font-weight: 400;">Within 3 days of receipt of the goods, you will be offered the choice of full refund.</span></p>
                <ol>
                   <li style="font-weight: 400;"><span style="font-weight: 400;">We will be offering a refund in the form of a voucher within 3 days. After 3 days, it is a no refund no return policy.</span></li>
                   <li style="font-weight: 400;"><span style="font-weight: 400;">The terms and conditions of the voucher are separate. Customers will only be able to use it on Althy platforms (Web/Apps) and it will be valid for a month after its issuing date. Customers will only be able to use it once, in one order for the whole amount and cannot be split into different orders. Once the code is used on the platforms it will be inapplicable. The refund amount will be given as a discount in the form of a voucher to the customer.</span></li>
                   <li style="font-weight: 400;"><span style="font-weight: 400;">We will only be giving a refund(in under 3 days) if the packaging is intact, the product is not damaged/broken or any other issue.</span></li>
                </ol>
                <p><span style="font-weight: 400;">Customers will have to bring/send the product to their nearest store for a refund within 3 days. If you are in a city outside of Islamabad / Rawalpindi, customers can deliver the product to the nearest TCS, and we will pass it through a Quality Control check, to see if a refund is applicable.</span></p>
                <p><span style="font-weight: 400;">If after the three days there is a technical fault in the product, customers can call our helpline, and we will guide them to contact the brand&rsquo;s warranty center.</span></p>
                <p><span style="font-weight: 400;">For device related issues after usage or the expiration of the return window, we will refer customers to the brand warranty center (if applicable).</span></p>
                <p><span style="font-weight: 400;">Please note that the refund claim will not be entertained if the invoice at the time of delivery is not stamped.</span></p>
                <p><span style="font-weight: 400;">**Please note that products are not eligible for a return if the product is &ldquo;No longer needed/changed your mind&rdquo;.</span></p>
                <p><strong>Conditions for Returns</strong></p>
                <ul>
                   <ol>
                      <li style="font-weight: 400;"><span style="font-weight: 400;">The product must be unused, and without any flaws. If a product is returned to us in an inadequate condition, we reserve the right to send it back to customer.</span></li>
                      <li style="font-weight: 400;"><span style="font-weight: 400;">The product must include the original tags, user manual, warranty cards, freebies and accessories.</span></li>
                      <li style="font-weight: 400;"><span style="font-weight: 400;">The product must be returned in the original and undamaged manufacturer packaging / box. Do not put tape or stickers on the manufacturer's box.</span></li>
                   </ol>
                </ul>
                <p><span style="font-weight: 400;">**Althy reserves the right to not issue a full refund if the packaging is broken, the item is broken/damaged, or if the problem is not genuine. (See relevant scenarios below)</span></p>
                <p><strong>If the item is damaged when received by the customer:</strong><span style="font-weight: 400;"><br /></span><span style="font-weight: 400;">If a customer returns an item to the store, a QC check will be done. If the item is actually damaged as told by the customer, we will check was it damaged while delivering, or packing, or any of the steps shown. If the item was damaged during the time of picking, that is, the pickers picked a damaged product or damaged it while picking, the customer will be issued a voucher by Althy, that he/she can avail on the web/apps within a one month time frame.</span></p>
                <p><strong>If the product is Lost or Broken:</strong><span style="font-weight: 400;"><br /></span><span style="font-weight: 400;">If a customer never receives the item, and he/she has already paid the amount, then the amount will be returned to the customer by the relevant mode of payment, within the time frame told by the payment partner authority.</span><span style="font-weight: 400;"><br /></span><span style="font-weight: 400;">Missing Parts or Accessories:</span><span style="font-weight: 400;"><br /></span><span style="font-weight: 400;">If the customer returns an item and says the reason is that some parts were missing, or it did not have full components, we will check how it was received by the store and the supplier. a voucher will be issued to the customer, of the full amount of the purchase.</span></p>
                <p><strong>Box damaged/Seal Broken:</strong><span style="font-weight: 400;"><br /></span><span style="font-weight: 400;">If an item is returned with its seal broken, or its packaging not intact in any form, it will not warrant a refund. If, the customer claims that the item was delivered to him with a broken seal or damaged packaging, we will check with QC on how it was delivered, and get in touch with 3PL. If the final check of QC shows that the seal was intact, then the voucher will not be issued, and vice versa. However, we reserve the right to not issue a voucher in a case where the seal was never damaged by our in store team or by the 3PL.</span></p>
                <p><strong>Wrong Item Returned:</strong><span style="font-weight: 400;"><br /></span><span style="font-weight: 400;">If at the final check of QC before delivering the item is something else, however the item returned is something else, then a refund will not be issued. However, if in such a case, the customer claims that the item returned is the one that was delivered also, we will check with final QC and 3PL. If the 3PL mixed up the delivery, and delivered the wrong product, we will issue a voucher to the customer.</span></p>
                <p><span style="font-weight: 400;"><br /></span><strong>Wrong Item Sent:</strong><span style="font-weight: 400;"><br /></span><span style="font-weight: 400;">If the customer returns the product claiming it is not what he/she had ordered, i.e. the variant is different, the color is wrong, or it is not as that shown on the platforms, then we will issue him/her a voucher if applicable.</span></p>
                <p><span style="font-weight: 400;"><br /></span><strong>Wrong Item Sent, Damaged Packaging on Return:</strong><span style="font-weight: 400;"><br /></span><span style="font-weight: 400;">If the item sent to the customer was wrong, yet on return, the packaging was not intact, the seal was broken or otherwise, we shall not issue the customer a voucher.</span></p>
            </div>
        </div>
    </div>
</div>
@endsection
