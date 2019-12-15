<div class="lime-sidebar">
    <div class="lime-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            <li>
                <a href="{{backend()}}" class="active"><i class="material-icons">trending_up</i>Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="material-icons">shopping_basket</i>Carts<i class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{backend('model/Order')}}">Orders</a>
                    </li>
                    <li>
                        <a href="{{backend('model/Payment')}}">Payments</a>
                    </li>
                    <li>
                        <a href="{{backend('model/Shipping')}}">Shipping</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="material-icons">developer_board</i>Catalog<i class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{backend('model/Product')}}">Products</a>
                    </li>
                    <li>
                        <a href="{{backend('model/Category')}}">Categories</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href=""><i class="material-icons">emoji_people</i>Customers<i class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{backend('model/User')}}">Users</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-title">
                Utility Operator
            </li>
            <li>
                <a href="{{backend('model/Notification')}}"><i class="material-icons">notification_important</i>Notifications</a>
            </li>
            <li>
                <a href="{{backend('automation')}}"><i class="material-icons">av_timer</i>Automation</a>
            </li>
            <li>
                <a href="{{backend('api')}}"><i class="material-icons">settings_input_antenna</i>Api System</a>
            </li>

            {{--            <li>--}}
            {{--                <a href=""><i class="material-icons">thumb_up</i>Marketing<i--}}
            {{--                        class="material-icons has-sub-menu">keyboard_arrow_left</i></a>--}}
            {{--                <ul class="sub-menu">--}}
            {{--                    <li>--}}
            {{--                        <a href="">Facebook Shop</a>--}}
            {{--                    </li>--}}
            {{--                    <li>--}}
            {{--                        <a href="">Google Shopping</a>--}}
            {{--                    </li>--}}
            {{--                    <li>--}}
            {{--                        <a href="">Amazon Connettor</a>--}}
            {{--                    </li>--}}
            {{--                    <li>--}}
            {{--                        <a href="">Ebay Connettor</a>--}}
            {{--                    </li>--}}
            {{--                    <li>--}}
            {{--                        <a href="">Alibaba Connettor</a>--}}
            {{--                    </li>--}}
            {{--                </ul>--}}
            {{--            </li>--}}

        </ul>
    </div>
</div>
