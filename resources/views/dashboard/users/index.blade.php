@extends('layouts.app')
@section('title', 'Users')
@section('content')

<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title"><i class="uil uil-user"></i> Users</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mt-10">
                        <div class="table-cerificate">
                            <div class="table-responsive">
                                <table class="table ucp-table" id="content-table">
                                    <thead class="thead-s">
                                        <tr>
                                            <th class="text-center" scope="col">SN.</th>
                                            <th scope="col">Avatar</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Mobile</th>
                                            <th scope="col">Status</th>
                                            <th class="text-center" scope="col">Share</th>
                                            <th class="text-center" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $row)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="cell-ta">
                                                    <img style="width:40px;height:40px;object-fit:cover" src="@if($row->photo) {{ asset($row->photo) }} @else {{ asset("assets/images/hd_dp.jpg") }} @endif" alt="{{ $row->fullname }}" />
                                                </td>
                                                <td>{{ $row->fullname }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>
                                                    {{ ucfirst($row->type) }}
                                                    <br/>
                                                    @if($row->instructor_status != 'unapplied')
                                                    {!! InstructorBadge($row->instructor_status) !!}
                                                    @endif
                                                </td>
                                                <td>{{ $row->mobile }}</td>
                                                <td>{!! UserStatus($row->status) !!}</td>
                                                <td class="text-center">
                                                    <span  onclick="copyToClipboard('{{ route('share.user', $row->link) }}')" title="Share" class="gray-s"><i class="uil uil-share-alt"></i></span>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('view.user', $row->id) }}" title="View" class="gray-s"><i class="uil uil-eye"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</div>
<script>
    function copyToClipboard(text) {
      // Create a temporary input element
        var input = document.createElement("input");
        input.setAttribute("type", "text");
        input.setAttribute("value", text);
        document.body.appendChild(input);

        // Select the input text
        input.select();

        // Copy the selected text to the clipboard
        document.execCommand("copy");

        // Remove the temporary input element
        document.body.removeChild(input);
        alert("Link Copied. Paste to share")
        }
    </script>
@endsection
