<template>
    <div v-if="success" class="block text-sm text-green-600 bg-green-200 border border-green-400 h-12 flex items-center p-4 mb-4 rounded-sm relative" role="alert">
        <slot name="success"></slot>
        <button type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
            <span class="absolute top-0 bottom-0 right-0 text-2xl px-3 py-1 hover:text-green-900" aria-hidden="true" >×</span>
        </button>
    </div>
    <div v-else class="block text-sm text-red-600 bg-red-200 border border-red-400 h-12 flex items-center p-4 mb-4 rounded-sm relative" role="alert">
        <slot name="error"></slot>
        <button type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
            <span class="absolute top-0 bottom-0 right-0 text-2xl px-3 py-1 hover:text-red-900" aria-hidden="true" >×</span>
        </button>
    </div>
</template>

<script>
export default {
    props: ['success']
}
</script>
