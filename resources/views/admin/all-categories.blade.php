@extends('layouts.master')

<style>
    th, td {
        padding: 10px;
        text-align: center;
    }
    th { border-bottom: 2px solid #000; }
    td a {
         display: flex;
        justify-content: center;
        align-items: center;
    }
    td a i { margin-right: 5px;}
</style>


@section('contentAdmin')
<div class="h-screen flex flex-col items-center justify-center container">
    <div class="flex justify-center text-5xl">
        <h3>View Categories</h3>
    </div>

    <table>
        <thead>
            <tr>
                <th>Category's name</th>
                <th>Delete</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $c)
            <tr>
                <td>{{ $c->category_name }}</td>
                <td>
                    <a onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this category?')){document.getElementById('delete-category-id-{{ $c->id }}').submit()}" href="#" class="flex justify-center"><i class="fa-solid fa-trash-can"></i></a>    
                        <form id="delete-category-id-{{ $c->id }}" action="{{ route('delete-category', ['id' => $c->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                </td>

                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="flex justify-center">
        <button id="addCategoryButton" class="self-center border rounded border-[#e8a2a2] bg-[#e8a2a2] hover:bg-white transition-all duration-300 p-1 btn btn-success" onclick="toggleCategoryForm()">Add category</button>
            <form id="addCategory" action="{{ route('add-category') }}" method="POST" class="hidden p-2 gap-4 w-full">
                @csrf
                    <div class="flex flex-col gap-1 justify-center">
                        <div class="inline-block text-center">
                            <label for="category_name">Category's name:</label>
                            <input type="text" name="category_name" id="category_name" class="accent-[#e8a2a2] form-control">
                        </div>
                        <div class="flex justify-between gap-2">
                            <button type="submit" class="w-1/2 self-center p-1 btn btn-primary mt-3 border rounded border-[#e8a2a2] bg-[#e8a2a2] hover:bg-white transition-all duration-300">Save Category</button>
                            <button type="reset" onclick="toggleCategoryForm()"  class="w-1/2 p-1 btn btn-primary mt-3 border rounded border-[#e8a2a2] bg-[#e8a2a2] hover:bg-white transition-all duration-300">Cancel</button>
                        </div>
                    </div>
                </form>
    </div>
</div>


<script>
    function toggleCategoryForm(){
        let form = document.getElementById('addCategory');
        let button = document.getElementById('addCategoryButton');
        form.classList.toggle('hidden');
        button.classList.toggle('hidden');
    }
</script>

@endsection