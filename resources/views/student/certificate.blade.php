@extends('student.layouts.app')


@section('title')
    My-Certificate
@endsection


@section('student-content')
    <div class="col-lg-8 mt_30">
        <table>
            <tr>
                <th>Course Name</th>
                <th>Issue Date</th>
                <th style="text-align: center">Action</th>
            </tr>
            @forelse ($certificates as $certificate)
                <tr>
                    <td>{{ $certificate->title }}</td>
                    <td>{{ $certificate->updated_at->format('F j, Y') }}</td>
                    <td style="text-align: center">
                        <a target="_blank" href="{{ route('student.certificate.download', $certificate->id) }}" class="button" title="Certificate Download">Download</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" style="text-align: center">No Certificate Found</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
