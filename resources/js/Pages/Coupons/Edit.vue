<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";

const props = defineProps({
    coupon: Object,
});

const form = useForm({
    code: props.coupon.code,
    percent_off: props.coupon.percent_off,
});

function submit() {
    form.put(route("coupons.update", props.coupon.id));
}
</script>

<template>
    <Head title="Edit Coupon" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Edit Coupon</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit" class="space-y-4">
                        <input
                            v-model="form.code"
                            type="text"
                            class="w-full rounded-md border-gray-300 shadow-sm"
                        />
                        <input
                            v-model="form.percent_off"
                            type="number"
                            class="w-full rounded-md border-gray-300 shadow-sm"
                        />
                        <button type="submit" class="rounded-md bg-gray-800 px-4 py-2 text-white">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
