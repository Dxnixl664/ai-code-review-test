<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    products: Array,
    search: String,
});

const term = ref(props.search);

function submitSearch() {
    router.get(route("products.index"), { search: term.value }, { preserveState: true });
}
</script>

<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Products</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submitSearch" class="mb-6 flex gap-2">
                        <input
                            v-model="term"
                            type="text"
                            placeholder="Search products..."
                            class="w-full rounded-md border-gray-300 shadow-sm"
                        />
                        <button type="submit" class="rounded-md bg-gray-800 px-4 py-2 text-white">
                            Search
                        </button>
                    </form>

                    <ul class="divide-y divide-gray-200">
                        <li v-for="product in products" :key="product.id" class="py-3">
                            <p class="font-medium">{{ product.name }}</p>
                            <p class="text-sm text-gray-500">{{ product.description }}</p>
                            <p class="text-sm text-gray-700">${{ product.price }}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
