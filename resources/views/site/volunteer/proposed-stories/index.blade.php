@extends('layouts.app')

@section('content')

<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('volunteer.dashboard') }}">لوحة التحكم</a></li>
            <li class="breadcrumb-item active">القصص المقترحة</li>
        </ol>
    </nav>

     
 

    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>#</th> 
                <th>العنوان</th>
                <th>الوصف</th>
                <th>النوع</th> 
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proposed_stories as $proposed_story)
            <tr>
                <td class="align-middle">{{ $loop->iteration }}</td>
          
                <td class="align-middle">{{ $proposed_story->title }}</td>
                <td class="align-middle">{{ Str::limit($proposed_story->description, 50) }}</td>
                <td class="align-middle">{{ $proposed_story->category->name }}</td>
                <td class="align-middle">
                    <a href="{{ route('volunteer.proposed-stories.show', $proposed_story->id) }}"
                        class="btn btn-primary btn-sm">تفاصيل</a> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection