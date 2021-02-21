<ul class="mt-6">
    <x-part.menu-item name="Dashboard" url="{{ route('dashboard') }}">
        <x-slot name="icon">
            <x-icons.outline.home class="w-5 h-5" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"/>
        </x-slot>
    </x-part.menu-item>

    {{-- <x-part.menu-item name="Forms" url="#">
        <x-slot name="icon">
            <x-icons.outline.clipboard-list class="w-5 h-5" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"/>
        </x-slot>
    </x-part.menu-item>

    <x-part.menu-item name="Cards" url="#">
        <x-slot name="icon">
            <x-icons.outline.collection class="w-5 h-5" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"/>
        </x-slot>
    </x-part.menu-item>

    <x-part.menu-item name="Charts" url="#">
        <x-slot name="icon">
            <x-icons.outline.chart-pie class="w-5 h-5" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"/>
        </x-slot>
    </x-part.menu-item>

    <x-part.menu-item name="Buttons" url="#">
        <x-slot name="icon">
            <x-icons.outline.cursor-click class="w-5 h-5" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"/>
        </x-slot>
    </x-part.menu-item>

    <x-part.menu-item name="Modals" url="#">
        <x-slot name="icon">
            <x-icons.outline.duplicate class="w-5 h-5" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"/>
        </x-slot>
    </x-part.menu-item>

    <x-part.menu-item name="Tables" url="#">
        <x-slot name="icon">
            <x-icons.outline.menu class="w-5 h-5" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"/>
        </x-slot>
    </x-part.menu-item> --}}

    <x-part.menu-kitchen-sink />
</ul>
