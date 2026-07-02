<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router } from "@inertiajs/vue3";

defineProps({
    invoices: Array,
});

function destroy(id) {
    if (confirm("Delete this invoice?")) {
        router.delete(route("invoices.destroy", id));
    }
}
</script>

<template>
    <Head title="Invoices" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Invoices</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg">
                    <ul class="divide-y divide-gray-200">
                        <li
                            v-for="invoice in invoices"
                            :key="invoice.id"
                            class="flex items-center justify-between py-3"
                        >
                            <div>
                                <p class="font-medium">{{ invoice.number }}</p>
                                <p class="text-sm text-gray-500">${{ invoice.amount }}</p>
                            </div>
                            <button
                                @click="destroy(invoice.id)"
                                class="text-sm text-red-600 hover:text-red-800"
                            >
                                Delete
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
