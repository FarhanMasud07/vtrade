<nav id="sidebar">
    <a href="{{ route('admin.inventorydashboard') }}">
        <div class="sidebar-header">
            <div class="row">
                <div class="col-lg-3">
                    <img width="50px" src="{{asset('uploads/user/thumb/'.Auth::user()->image)}}" alt="">
                </div>
                <div class="col-lg-9">
                    <h5>{{Auth::user()->name}} <br><strong
                            style="font-size: 10px">@foreach(Auth::user()->roles as $role)
                                {{$role->name}}
                            @endforeach</strong>
                    </h5>
                </div>
            </div>
        </div>
    </a>

    <ul class="list-unstyled components">
    
        <li class="{{Request::is('admin/inventory/dashboard*') ? 'active' : '' }}">
            <a href="{{ route('admin.inventorydashboard') }}"><i class="fas fa-chart-line"></i> Inventory Dashboard</a>
        </li>
        
        @can('business.chart')
            <li class="{{Request::is('admin/growth_charts*') ? 'active' : '' }}">
                <a href="{{ route('charts.index') }}"><i class="fas fa-chart-bar"></i>Business Growth Charts</a>
            </li>
        @endcan

        @can('sms.logs')
            <li class="{{Request::is('admin/sms_logs*') ? 'active' : '' }}">
                <a href="{{ route('sms_logs.index') }}"><i class="fas fa-envelope"></i>SMS Logs</a>
            </li>
        @endcan

        @can('stock.display')
            <li class="{{Request::is('admin/stock*') ? 'active' : '' }}">
                <a href="{{ route('stock.index') }}"> <i class="fa fa-cubes"></i> Stock</a>
            </li>
        @endcan

        @can('challan.index')
            <li class="{{Request::is('admin/challan*') ? 'active' : '' }}">
                <a href="{{ route('challan.index') }}"> <i class="fa fa-file-word"></i> Challan</a>
            </li>
        @endcan


        @if(Auth::user()->hasAnyPermission(['expense.index','expense_type.index']))
            <li>
                <a href="#expense" data-toggle="collapse"
                   aria-expanded="{{Request::is('admin/expense*') ? 'true' : '' }}" class="dropdown-toggle"> <i
                        class="fa fa-dollar-sign"></i> Expense Section</a>
                <ul class="collapse list-unstyled {{Request::is('admin/expense*') ? 'active collapse show' : '' }}"
                    id="expense">

                    @can('expense.index')
                        <li class="{{Request::is('admin/expense') ? 'active' : '' }}">
                            <a href="{{ route('expense.index') }}"><i class="fas fa-hand-holding-usd"></i> Expense</a>
                        </li>
                    @endcan
                    @can('expense_type.index')
                        <li class="{{Request::is('admin/expensecategories*') ? 'active' : '' }}">
                            <a href="{{ route('expensecategories.index') }}"><i class="fas fa-funnel-dollar"></i>
                                Expense
                                Type</a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endif


        @can('general_options.show')

            <li class="{{Request::is('admin/generaloption*') ? 'active' : '' }}">
                <a href="{{route('generaloption.index')}}"> <i class="fas fa-filter"></i>General Options</a>
            </li>
        @endcan

        @can('roles.permissions')
            <li class="{{Request::is('admin/rp/roles*') ? 'active' : '' }}">
                <a href="{{route('roles.index')}}"> <i class="fas fa-user-shield"></i>Roles &amp; Permissions</a>
            </li>
        @endcan

        @if(Auth::user()->hasAnyPermission(['products.index','product_size.index','product_type.index']))

            <li>
                <a href="#product_section" data-toggle="collapse"
                   aria-expanded="{{Request::is('admin/product_section*') ? 'true' : '' }}" class="dropdown-toggle"> <i
                        class="fas fa-box-open"></i> Product Section</a>
                <ul class="collapse list-unstyled {{Request::is('admin/product_section*') ? 'active collapse show' : '' }}"
                    id="product_section">
                    @can('products.index')
                        <li class="{{Request::is('admin/product_section/products*') ? 'active' : '' }}">
                            <a href="{{route('products.index')}}"> <i class="fas fa-box-open"></i> Products</a>
                        </li>
                    @endcan
                    @can('products.index')
                        <li class="{{Request::is('admin/product_section/raw*') ? 'active' : '' }}">
                            <a href="{{route('raw.index')}}"> <i class="fas fa-paw"></i>Raw Materials </a>
                        </li>
                    @endcan

                    @can('products.index')
                        <li class="{{Request::is('admin/product_section/brands') ? 'active' : '' }}">
                            <a href="{{route('brands.index')}}"> <i class="fas fa-band-aid"></i>Product Brands</a>
                        </li>
                    @endcan

                    @can('products.index')
                        <li class="{{Request::is('admin/product_section/categories') ? 'active' : '' }}">
                            <a class="nav-link" href="{{route('categories.index')}}"> <i class="fa fa-bullseye"></i>Product
                                Category</a>
                        </li>
                    @endcan
                    @can('product_size')
                        <li class="{{Request::is('admin/product_section/sizes*') ? 'active' : '' }}">
                            <a href="{{route('sizes.index')}}"> <i class="fas fa-window-maximize"></i>Product Sizes</a>
                        </li>
                    @endcan
                    @can('product_type')
                        <li class="{{Request::is('admin/product_section/product_types') ? 'active' : '' }}">
                            <a class="nav-link" href="{{route('product_types.index')}}"><i class="fa fa-subway"></i>Product
                                Types</a>
                        </li>
                    @endcan

                </ul>
            </li>

        @endif

        @can('payment_methods')
            <li class="{{Request::is('admin/ecom/paymentmethod') ? 'active' : '' }}">
                <a href="{{ route('paymentmethod.index') }}"> <i class="fab fa-cc-amazon-pay"></i> Payment Method</a>
            </li>
        @endcan



        {{--        @can('Managers Section')--}}
        {{--            <li>--}}
        {{--                <a href="#managers-section" data-toggle="collapse"--}}
        {{--                   aria-expanded="{{Request::is('admin/manager*') ? 'true' : '' }}" class="dropdown-toggle"><i--}}
        {{--                        class="fas fa-user-tie"></i> Managers Section</a>--}}
        {{--                <ul class="collapse list-unstyled {{Request::is('admin/manager*') ? 'active collapse show' : '' }}"--}}
        {{--                    id="managers-section">--}}
        {{--                    <li class="{{Request::is('admin/manager/assigncustomers') ? 'active' : '' }}">--}}
        {{--                        <a class="nav-link" href="{{ route('assigncustomers.index')}}">Assign Customers For Managers</a>--}}
        {{--                    </li>--}}

        {{--                    <li class="{{Request::is('admin/manager/employeewiseperformance') ? 'active' : '' }}">--}}
        {{--                        <a href="{{ route('report.employeewiseperformance') }}"> Manager Performance Report</a>--}}
        {{--                    </li>--}}
        {{--                </ul>--}}
        {{--            </li>--}}
        {{--        @endcan--}}

        @if(Auth::user()->hasAnyPermission(['sales_invoice.index','cash.index','return_invoice.index','previous_due.index','customers.index']))
            <li>
                <a href="#pos" data-toggle="collapse" aria-expanded="{{Request::is('admin/pos*') || Request::is('admin/sales_invoice*')  ? 'true' : '' }}"
                   class="dropdown-toggle"> <i class="fas fa-truck-moving"></i> Inventory Section</a>
                <ul class="collapse list-unstyled {{Request::is('admin/pos*') || Request::is('admin/sales_invoice*') ? 'active collapse show' : '' }}"
                    id="pos">


                    @can('customers.index')
                        <li class="{{Request::is('admin/pos/customers') ? 'active' : '' }}">
                            <a href="{{ route('customers.index') }}"><i class="fas fa-user-friends"></i>Customers</a>
                        </li>
                    @endcan

                    @can('previous_due.index')
                        <li class="{{Request::is('admin/pos/prevdue*') ? 'active' : '' }}">
                            <a href="{{ route('prevdue.index') }}"><i class="fas fa-search-dollar"></i> Previous Due</a>
                        </li>
                    @endcan

                    @can('sales_invoice.index')
                        <li class="{{Request::is('admin/sales_invoice*') ? 'active' : '' }}">
                            <a href="{{ route('sales_invoice.index') }}"><i class="fas fa-people-carry"></i>Sales Invoices</a>
                        </li>
                    @endcan

                    @can('cash.index')
                        <li class="{{Request::is('admin/pos/cash*') ? 'active' : '' }}">
                            <a href="{{ route('cash.index') }}"><i class="fas fa-hand-holding-usd"></i>Cashes</a>
                        </li>
                    @endcan

                    @can('return_invoice.index')
                        <li class="{{Request::is('admin/pos/returnproduct*') ? 'active' : '' }}">
                            <a href="{{ route('returnproduct.index') }}"><i class="fas fa-undo"></i>Returns</a>
                        </li>
                    @endcan

                </ul>

            </li>
        @endif
        @can('company_info.index')
            <li class="{{Request::is('admin/company*') ? 'active' : '' }}">
                <a href="{{ route('company.index') }}"><i class="fas fa-building"></i> Company Information</a>
            </li>
        @endcan


        @can('trade_price.index')
            <li class="{{Request::is('admin/tp*') ? 'active' : '' }}">
                <a href="{{ route('tp.index') }}"><i class="fas fa-money-bill-alt"></i> Update Trade Price</a>
            </li>
        @endcan


        @can('purchase.index')
            <li class="{{Request::is('admin/purchase*') ? 'active' : '' }}">
                <a href="{{ route('purchase.index') }}"> <i class="fas fa-store"></i> Purchase</a>
            </li>
        @endcan

        @if(Auth::user()->hasAnyPermission(['suppliers.index','suppliers.payment.index','supplier_due.index']))
        <li>
            <a href="#suppliersection" data-toggle="collapse"
               aria-expanded="{{Request::is('admin/suppliersection*') ? 'true' : '' }}" class="dropdown-toggle"> <i
                    class="fas fa-hospital-user"></i> Suppliers Section</a>
            <ul class="collapse list-unstyled {{Request::is('admin/suppliersection*') ? 'active collapse show' : '' }}"
                id="suppliersection">
                @can('suppliers.index')
                    <li class="{{Request::is('admin/suppliersection/suppliers') ? 'active' : '' }}">
                        <a href="{{ route('suppliers.index') }}"> <i class="fas fa-hospital-user"></i> Suppliers</a>
                    </li>
                @endcan
                @can('suppliers.payment.index')
          
                        <li class="{{Request::is('admin/suppliersection/payment') ? 'active' : '' }}">
                            <a href="{{ route('payment.index') }}"><i class="fas fa-dollar-sign"></i> Payment</a>
                        </li>
                    @endcan
                @can('supplier_due.index')
                    <li class="{{Request::is('admin/suppliersection/supplierdue') ? 'active' : '' }}">
                        <a href="{{ route('supplierdue.index') }}"><i class="fas fa-search-dollar"></i> Supplier Due</a>
                    </li>
                @endcan
            </ul>

        </li>

        @endif


        {{--        @can('Employee Section')--}}

        {{--            <li class="{{Request::is('admin/emp_type*') ? 'active' : '' }}">--}}
        {{--                <a href="{{ route('emp_type.index') }}"><i class="fas fa-user-tag"></i> Employee Type</a>--}}
        {{--            </li>--}}

        {{--            <li class="{{Request::is('admin/employee*') ? 'active' : '' }}">--}}
        {{--                <a href="{{ route('employee.index') }}"><i class="fas fa-users"></i> Employee's</a>--}}
        {{--            </li>--}}

        {{--        @endcan--}}

        {{--        @can('Marketing Report')--}}
        {{--            <li class="{{Request::is('admin/marketingreport*') ? 'active' : '' }}">--}}
        {{--                <a href="{{ route('marketingreport.index') }}"><i class="fas fa-bullhorn"></i>Marketing Sales Report</a>--}}
        {{--            </li>--}}
        {{--        @endcan--}}


        @can('admin.permission')
            <li class="{{Request::is('admin/admininfo*') ? 'active' : '' }}">
                <a href="{{ route('admininfo.index') }}"><i class="fas fa-user-alt"></i> Admin</a>
            </li>
        @endcan


        @can('backup')
            <li class="{{Request::is('admin/backups') ? 'active' : '' }}">
                <a href="{{ route('backups.index') }}"> <i class="fab fa-google-drive"></i>Backup</a>
            </li>
        @endcan
        @if(Auth::user()->hasAnyPermission([
            'customer.statements',
            'customer.details.statements',
            'customer.due.report',
            'stock.report',
            'cash.report',
            'sales.report',
            'sales_details.report',
            'delivery.report',
            'supplier_due.report',
            'date_wise_product.report',
        ]))

            <li class="{{Request::is('admin/report*') ? 'active' : '' }}">
                <a href="#user-outstanding" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i
                        class="fa fa-info-circle"></i> Reports</a>
                <ul class="collapse list-unstyled {{Request::is('admin/report*') ? 'active collapse show' : '' }}"
                    id="user-outstanding">


                    @can('customer.statements')
                        <li class="{{Request::is('admin/report/pos/posuserstatement') ? 'active' : '' }}">
                            <a href="{{ route('report.posuserstatement') }}"><i class="fa fa-layer-group"></i> customer
                                Statement</a>
                        </li>
                    @endcan

                    @can('customer.details.statements')
                        <li class="{{Request::is('admin/report/pos/posdeatailstatement') ? 'active' : '' }}">
                            <a href="{{ route('report.posdetailstatement') }}"><i class="fa fa-layer-group"></i>
                                customer
                                Detail Statement</a>
                        </li>
                    @endcan

                    @can('customer.due.report')
                        <li class="{{Request::is('admin/report/pos/duereport*') ? 'active' : '' }}">
                            <a href="{{ route('report.duereport') }}"><i class="fa fa-layer-group"></i>Customer Due
                                Report</a>
                        </li>
                    @endcan

                    @can('stock.report')
                        <li class="{{Request::is('admin/report/stockreport') ? 'active' : '' }}">
                            <a href="{{ route('stockreport.report') }}"> <i class="fa fa-layer-group"></i> Stock Report</a>
                        </li>
                    @endcan



                    @can('cash.index')
                        <li class="{{Request::is('admin/report/cashreport*') ? 'active' : '' }}">
                            <a href="{{ route('report.poscashreport') }}"><i class="fa fa-layer-group"></i> Cash Report</a>
                        </li>
                    @endcan


                    @can('sales.report')
                        <li class="{{Request::is('admin/report/pos/salesreport*') ? 'active' : '' }}">
                            <a href="{{ route('report.possalesreport') }}"><i class="fa fa-layer-group"></i>Sales Report</a>
                        </li>
                    @endcan

                        @can('sales_details.report')
                    <li class="{{Request::is('admin/report/pos/sales_details_report*') ? 'active' : '' }}">
                        <a href="{{ route('report.sale_details') }}"><i class="fa fa-layer-group"></i>Sales Details Report</a>
                    </li>
                        @endcan
                    @can('delivery.report')
                        <li class="{{Request::is('admin/report/pos/deliveryreport*') ? 'active' : '' }}">
                            <a href="{{ route('report.posdeliveryreport') }}"><i class="fa fa-layer-group"></i>Delivery
                                Report</a>
                        </li>
                    @endcan

                    @can('supplier_due.report')
                        <li class="{{Request::is('admin/report/supplierdue*') ? 'active' : '' }}">
                            <a href="{{ route('report.supplierdue') }}"><i class="fa fa-layer-group"></i>Supplier Due
                                Report</a>
                        </li>
                    @endcan

{{--                    @can('Marketing Report')--}}
{{--                        <li class="{{Request::is('admin/report/marketingreport*') ? 'active' : '' }}">--}}
{{--                            <a href="{{ route('report.marketingreport') }}"><i class="fa fa-layer-group"></i>Marketing--}}
{{--                                Report</a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}

                    @can('expense.report')
                        <li class="{{Request::is('admin/report/expensereport') ? 'active' : '' }}">
                            <a href="{{ route('expensereport.index') }}"> <i class="fa fa-layer-group"></i> Expense
                                Report</a>
                        </li>
                    @endcan

                    @can('date_wise_product.report')
                        <li class="{{Request::is('admin/report/date_wise_product') ? 'active' : '' }}">
                            <a href="{{ route('report.date_wise_product') }}"> <i class="fa fa-layer-group"></i>
                                Date wise
                                Product Report</a>
                        </li>
                    @endcan


                </ul>

            </li>
        @endif
        <li class="{{Request::is('admin/action/changepassword') ? 'active' : '' }}">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                    class="fas fa-directions"></i> Action</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a class="nav-link" href="{{ route('admin.changepassword')}}">Change Password</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('admin.profile')}}">Profile</a>
                </li>

                <li>
                    <a class="nav-link" href="{{ route('admin.logout') }}">Logout</a>
                </li>


            </ul>

        </li>

    </ul>


</nav>
