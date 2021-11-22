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
                <h1>Contact</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="panel panel-default ">
                                <div class="panel-heading">
                                    <div class="col-6"> Contact us</div>
                                    <div class="col-6">

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

                                                <th>Name</th>
                                                <th>email</th>
                                                <th>phone</th>
                                                <th> message</th>

                                                <th>Created At</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contacts as $contact)
                                                <tr>
                                                    <td>{{ $contact->id }}</td>

                                                    <td>{{ $contact->name }}</td>
                                                    <td>{{ $contact->email }}</td>

                                                    <td>{{ $contact->phone }}</td>
                                                    <td>{{$contact->message}}</td>
                                                    <td>{{ $contact->created_at }}</td>



                                                </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                    {{ $contacts->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>

