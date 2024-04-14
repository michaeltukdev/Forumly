@php
    $alertType = session('alert')['type'];
    $alertMessage = session('alert')['message'];

    $colorScheme = [
        'success' => [
            'border' => 'border-green-500',
            'background' => 'bg-green-300 bg-opacity-20',
            'titleText' => 'text-green-400',
            'bodyText' => 'text-green-200',
            'title' => 'Success!',
        ],
        'error' => [
            'border' => 'border-red-500',
            'background' => 'bg-red-300 bg-opacity-20',
            'titleText' => 'text-red-400',
            'bodyText' => 'text-red-200',
            'title' => 'Alert!',
        ],
    ][$alertType];
@endphp

<div x-data="{ show: true }" x-init="setTimeout(() => { show = false }, 5000)" class="absolute max-w-md bottom-5 right-5">
    <div x-show="show"  x-transition  role="alert" class="p-4 {{ $colorScheme['border'] }} rounded border-s-4 {{ $colorScheme['background'] }}">
        <strong class="block font-medium {{ $colorScheme['titleText'] }}"> {{ $colorScheme['title'] }} </strong>

        <p class="mt-2 text-sm {{ $colorScheme['bodyText'] }}">
            {{ $alertMessage }}
        </p>
    </div>
</div>

