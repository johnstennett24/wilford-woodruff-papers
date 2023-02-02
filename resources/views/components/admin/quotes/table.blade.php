<!-- Activity table (small breakpoint and up) -->
<div class="overflow-hidden overflow-x-auto min-w-full align-middle shadow sm:rounded-lg">
    <table
        x-data="{
                open: $persist(null)
            }"
        class="min-w-full divide-y divide-cool-gray-200">
        <thead>
        <tr>
            {{ $head }}
        </tr>
        </thead>

        <tbody class="bg-white divide-y divide-cool-gray-200">
        {{ $body }}
        </tbody>
    </table>
</div>
