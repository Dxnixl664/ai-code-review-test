<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";

defineProps({
    comments: Array,
});

const form = useForm({
    body: "",
});

function submit() {
    form.post(route("comments.store"), {
        onSuccess: () => form.reset(),
    });
}
</script>

<template>
    <Head title="Comments" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Comments</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit" class="mb-6 space-y-4">
                        <textarea
                            v-model="form.body"
                            placeholder="Write a comment... (supports basic formatting)"
                            class="w-full rounded-md border-gray-300 shadow-sm"
                        ></textarea>
                        <button type="submit" class="rounded-md bg-gray-800 px-4 py-2 text-white">
                            Post comment
                        </button>
                    </form>

                    <ul class="space-y-4 divide-y divide-gray-200">
                        <li v-for="comment in comments" :key="comment.id" class="pt-4 first:pt-0">
                            <p class="text-sm font-medium text-gray-700">{{ comment.user.name }}</p>
                            <!-- Renders comment body as rich text so users can format with basic HTML -->
                            <div class="prose prose-sm mt-1" v-html="comment.body"></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
