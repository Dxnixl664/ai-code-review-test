<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router } from "@inertiajs/vue3";

defineProps({
    invoices: Array,
    status: String,
});

function filterBy(status) {
    router.get(route("invoices.by-status"), { status });
}
</script>

<template>
    <Head title="Invoices by Status" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Invoices by Status</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg">
                    <div class="mb-4 flex gap-2">
                        <button
                            v-for="s in ['paid', 'unpaid', 'overdue']"
                            :key="s"
                            @click="filterBy(s)"
                            class="rounded-md px-3 py-1 text-sm"
                            :class="s === status ? 'bg-gray-800 text-white' : 'bg-gray-100'"
                        >
                            {{ s }}
                        </button>
                    </div>

                    <ul class="divide-y divide-gray-200">
                        <li v-for="invoice in invoices" :key="invoice.id" class="py-3">
                            <p class="font-medium">{{ invoice.number }}</p>
                            <p class="text-sm text-gray-500">${{ invoice.amount }}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
