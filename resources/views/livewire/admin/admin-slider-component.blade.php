<div>

    <style>
        nav .svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }

    </style>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Sliders</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Sliders</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row portfolio Container">
                        <div class="col-md-8 col-md-offset-2 profile1">
                            <div class="panel panel-default ">
                                <div class="panel-heading">
                                    <div class="col-6">Sliders</div>
                                    <div class="col-6">
                                        <a href="{{route('admin.add-slider')}}" class="btn btn-info pull-right">
                                            Add slider </a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    @if (Session::has('message'))
                                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                                    @endif
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>image</th>
                                                <th>title</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sliders as $slider)
                                                <tr>
                                                    <td>{{ $slider->id }}</td>
                                                    <td><img src="{{ asset('images/slider') }}/{{ $slider->image }}"
                                                            width="60"></td>
                                                    <td>{{ $slider->title}}</td>
                                                    <td>
                                                        @if ($slider->status)
                                                            Active
                                                        @else
                                                            InActive
                                                        @endif
                                                    </td>

                                                    <td>{{ $slider->created_at }}</td>

                                                    <td><a
                                                            href="{{ route('admin.edit-slider', ['slider_id' => $slider->id]) }}">
                                                            <i class="fa fa-edit fa-2x text-info"></i></a>
                                                     <a href="#"
                                                            onclick="confirm('Are you sure, you want to delete this service category!') || event.stopImmediatePropagation()"
                                                            wire:click.prevent="delet({{$slider->id }})"><i
                                                                class="fa fa-times fa-2x text-danger"></i></a>
                                                    </td>

                                                </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                    {{ $sliders->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>

