@extends('layouts.main')
@section('container')

@foreach($posts as $post)
<div id="card" class="bg-[#b8c0ff] relative text-black p-2 md:px-2 md:py-5 rounded md:w-96 flex items-center gap-4">
    <form action="/posts/{{ $post->id }}" method="post">
        @method('delete')
        @csrf
        <button class="absolute right-2 top-1"><i data-feather="x" style="width: 18px" onclick="return confirm('Are you sure?')"></i></button>
    </form>
    <div class=" status flex items-center ml-2">
        <input type="checkbox" id="checkboxStatus" class="checkbox checkbox-success border-black " {{ $post->status != NULL ? 'checked' : '' }} onchange="handleCheckboxChange(event)" data-post-id="{{ $post->id }}" />
    </div>
    <div class="task">
        <p class="font-semibold body" id="taskText">
            {{ $post->body }}
        </p>
        <small class="date text-[12px]"> {{ $post->deadline}} </small>
    </div>
</div>
@endforeach

<!-- Modal -->
<button class="btn fixed px-1 border-none rounded-full bottom-[8%] right-10 bg-[#736ced] hover:bg-[#665fe4] transition-all duration-100 ease-in md:bottom-36 md:right-36" onclick="my_modal_3.showModal()">
    <i data-feather="plus" style="width: 40px; stroke: aliceblue"></i>
</button>

<dialog id="my_modal_3" class="modal">
    <div class="modal-box md:w-96">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">
                ✕
            </button>
        </form>
        <form action="/posts/new" method="post" class="pt-8 md:flex flex-col gap-3 ">
            @csrf
            <input type="text" placeholder="Input new task here" class="input input-bordered w-full max-w-xs mb-2 self-center" name="body" />
            <select class="select select-bordered w-full max-w-xs mb-2 self-center" name="category">
                <option disabled selected>Select a category</option>
                <option value="Study">Study</option>
                <option value="Work">Work</option>
            </select>
            <input type="date" placeholder="Input new task here" class="input input-bordered w-full max-w-xs mb-3 self-center" name="deadline" />
            <button type="submit" class="btn btn-sm btn-primary self-end">Submit</button>
        </form>
    </div>
</dialog>
<!-- Modal end -->
@endsection