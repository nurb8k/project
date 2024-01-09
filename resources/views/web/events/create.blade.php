<x-app-layout>
    <style>
        .findLocation {
            position: absolute;
            margin: auto;
            width: 15rem;
            min-height: 3rem;
            font-size: 1.2rem;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background-color: #2c2c2c;
            cursor: pointer;
            border: none;
            outline: none;
            color: white;
        }

        .findLocation:hover {
            background-color: #2c2c2c;
        }

        @media screen and (max-width: 550px) {
            .findLocation {
                position: absolute;
                margin: auto;
                width: 8rem;
                right: 2rem;
                min-height: 3rem;
                font-size: 1.1rem;
            }
        }
    </style>
    <livewire:web.event.create />
</x-app-layout>
