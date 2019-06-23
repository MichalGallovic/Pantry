<template>
    <portal to="out-off-container">
        <div class="flex modal-backdrop px-3" @click.self="$emit('modal:close')">
            <slot></slot>
        </div>
    </portal>
</template>
