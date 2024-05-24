<script setup lang="ts">
import {TransitionRoot, TransitionChild, Dialog, DialogPanel, DialogTitle} from "@headlessui/vue";
import {ref} from 'vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import {useForm} from "@inertiajs/vue3";
import ListBox from "@/Components/ListBox.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import CreateUnit from "@/Pages/Unit/Create.vue";

const props = defineProps(['manufacturer', 'categories', 'statuses', 'units'])
const emit = defineEmits(['load'])
const isOpen = ref<Boolean>(false)
const closeModal = () => {
    isOpen.value = false
}

const openModal = () => {
    isOpen.value = true
}

const form = useForm({
    name: '',
    manufacturer: {name: '-- select --', id: null},
    category: {name: '-- select --', id: null},
    status: {name: '-- select --', id: null},
    unit: {name: '-- select --', id: null},
})

const submit = () => {
    form.post(route('product.create'), {
        onSuccess: () => {
            alert('Create product successfully')
            emit('load', true)
            form.reset()
            closeModal()
        },
        onError: () => {
            alert('Failed create product')
            form.reset()
            closeModal()
        }
    })
}

const loadUnit = () => {
    emit('load', true)
}
</script>
<template>
    <div class="flex items-center justify-end">
        <PrimaryButton
            type="button"
            @click="openModal">
            Create Product
        </PrimaryButton>
    </div>
    <TransitionRoot appear :show="isOpen" as="template">
        <Dialog as="div" @close="closeModal" class="relative z-10">
            <TransitionChild
                as="template"
                enter="duration-300 ease-out"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="fixed inset-0 bg-black/25"/>
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto">
                <div
                    class="flex min-h-full items-center justify-center p-4 text-center"
                >
                    <TransitionChild
                        as="template"
                        enter="duration-300 ease-out"
                        enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100"
                        leave="duration-200 ease-in"
                        leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95"
                    >
                        <DialogPanel
                            class="w-full max-w-5xl transform rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all"
                        >
                            <form @submit.prevent="submit">
                                <DialogTitle
                                    as="h3"
                                    class="text-lg font-medium leading-6 text-gray-900"
                                >
                                    Create Product
                                </DialogTitle>
                                <div class="mt-6 grid grid-cols-4 gap-3">
                                    <div class="col-span-4">
                                        <InputLabel for="name" value="Name Product"/>

                                        <TextInput
                                            id="name"
                                            type="name"
                                            class="mt-1 block border py-1.5 pl-2 w-full"
                                            v-model="form.name"
                                            required
                                            autofocus
                                        />

                                        <InputError class="mt-2" :message="form.errors.name"/>
                                    </div>
                                    <div class="col-span-2">
                                        <InputLabel for="manufacturer" value="Merek"/>
                                        <ListBox v-model="form.manufacturer" :data="manufacturer" />
                                    </div>
                                    <div class="col-span-2">
                                        <InputLabel for="categories" value="Categories"/>
                                        <ListBox v-model="form.category" :data="categories" />
                                    </div>
                                    <div class="col-span-2">
                                        <InputLabel for="status" value="Status"/>
                                        <ListBox v-model="form.status" :data="statuses" />
                                    </div>
                                    <div class="w-full col-span-2 grid grid-cols-6 gap-2 items-end justify-between">
                                        <div class="col-span-4">
                                            <InputLabel for="unit" value="Unit"/>
                                            <ListBox v-model="form.unit" :data="units" />
                                        </div>
<!--                                        <PrimaryButton class="h-10 w-fit col-span-2">Create Unit</PrimaryButton>-->
                                        <div class="h-10 w-fit col-span-2">
                                            <CreateUnit @load="loadUnit"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button
                                        :disabled="form.processing"
                                        type="submit"
                                        class="inline-flex justify-center rounded-md border border-transparent bg-blue-100 px-4 py-2 text-sm font-medium text-blue-900 hover:bg-blue-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2"
                                    >
                                        Create
                                    </button>
                                </div>
                            </form>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
