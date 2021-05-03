@extends('layouts.app-v2')

@section('content')
    <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words bg-gray-700 border border-2 border-gray-700 rounded shadow-md">
                    @auth
                        <div class="font-semibold bg-gray-800 text-gray-300 py-3 px-6 mb-0">
                            {{ __('Edit Profile') }}
                        </div>

                        <form class="w-full p-6" method="POST" action="{{ route('user.profile.update', $user->id) }}">
                            @csrf
                            <div class="flex flex-wrap mb-6">
                                <label for="email" class="block text-gray-300 text-sm font-bold mb-2">
                                    {{ __('Name') }}:
                                </label>

                                <input id="name" type="text" class="form-input w-full" name="name" value="{{ $user->name }}" required>

                            </div>
                            <div class="flex flex-wrap mb-6">
                                <label for="email" class="block text-gray-300 text-sm font-bold mb-2">
                                    {{ __('E-Mail Address') }}:
                                </label>

                                <input id="email" type="email" class="form-input w-full" name="email" value="{{ $user->email }}" required autocomplete="email">

                            </div>

                            <div class="flex flex-wrap mb-6">
                                <label for="password" class="block text-gray-300 text-sm font-bold mb-2">
                                    {{ __('Password') }}:
                                </label>

                                <input id="password" type="password" class="form-input w-full @error('password') border-red-500 @enderror" name="password" required>

                                @error('password')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="flex flex-wrap mb-6">
                                <label for="password_confirmation" class="block text-gray-300 text-sm font-bold mb-2">
                                    {{ __('Password Confirmation') }}:
                                </label>

                                <input id="password_confirmation" type="password" class="form-input w-full @error('password') border-red-500 @enderror" name="password_confirmation" required>

                                @error('password_confirmation')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>


                            <div class="flex flex-wrap justify-center">
                                <button type="submit" class="bg-orange-500 hover:bg-orange-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:ring">
                                    {{ __('Update Profile') }}
                                </button>

                            </div>
                        </form>
                    @endauth

                </div>
            </div>
        </div>
@endsection
