<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

defineProps({
    orders: Array,
});
</script>

<template>
    <Head title="All Orders" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">All Orders</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg">
                    <table class="w-full text-left text-sm">
                        <thead>
                            <tr>
                                <th class="pb-2">Order</th>
                                <th class="pb-2">Customer</th>
                                <th class="pb-2">Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr v-for="order in orders" :key="order.id">
                                <td class="py-2">#{{ order.id }}</td>
                                <td class="py-2">{{ order.customer_name }}</td>
                                <td class="py-2">${{ order.total }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
