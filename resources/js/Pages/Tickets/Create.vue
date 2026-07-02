<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";

const form = useForm({
    subject: "",
    description: "",
});

function submit() {
    form.post(route("tickets.store"));
}
</script>

<template>
    <Head title="Submit a Ticket" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Support Ticket</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit" class="space-y-4">
                        <input
                            v-model="form.subject"
                            type="text"
                            placeholder="Subject"
                            class="w-full rounded-md border-gray-300 shadow-sm"
                        />
                        <textarea
                            v-model="form.description"
                            placeholder="Describe your issue"
                            class="w-full rounded-md border-gray-300 shadow-sm"
                        ></textarea>
                        <button type="submit" class="rounded-md bg-gray-800 px-4 py-2 text-white">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
