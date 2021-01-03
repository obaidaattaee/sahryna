@extends('admin.layouts.app')
@section('content')
    @if (empty($subscriptions))

    @else

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue-hoki">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>ادارة الاشتراكات
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="alert alert-info">
                            <a href="{{ route('admin.settings.buyer.subscription.status') }}"
                                class="btn btn-sm btn-{{ App\Models\Settings::first()->buyer_subscription == 0 ? 'success' : 'danger' }}">
                                {{ App\Models\Settings::first()->buyer_subscription == 0 ? 'تفعيل الدفع للتجار' : 'ايقاف الدفع عن التجار' }}
                            </a>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="example">
                            <thead>
                                <tr>
                                    <th>
                                        العنوان
                                    </th>
                                    <th>
                                        الوصف
                                    </th>
                                    <th>
                                        المدة
                                    </th>
                                    <th>
                                        السعر
                                    </th>
                                    <th>
                                        نوع المستخدم
                                    </th>
                                    <th>
                                        الحالة
                                    </th>
                                    <th>
                                        تعديل \ حذف
                                    </th>
                                </tr>
                            </thead>
                            @foreach ($subscriptions as $subscription)
                                {{-- {{ dd($role['permissions']) }}
                                --}}
                                <tr>
                                    <td>{{ $subscription->title }}</td>
                                    <td>{{ $subscription->description }}</td>
                                    <td>{{ $subscription->time_day }}</td>
                                    <td>{{ $subscription->price }}</td>
                                    <td>{{ $subscription->role->display_name }}</td>
                                    <td>
                                        <a href="{{ route('subscriptions.cahnge.states', ['subscription' => $subscription->id]) }}"
                                            class="btn btn-{{ $subscription->active == 1 ? 'danger' : 'info' }} btn-sm">{{ $subscription->active == 1 ? 'ايقاف' : 'تفعيل' }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('subscriptions.edit', ['subscription' => $subscription->id]) }}"
                                            class="btn btn-info btn-sm">تعديل</a>
                                        <a href="{{ route('subscriptions.destroy', ['subscription' => $subscription->id]) }}"
                                            class="btn btn-danger btn-sm">حذف</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->

            </div>
        </div>
    @endif


@endsection
@section('js')

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

    </script>

@endsection
