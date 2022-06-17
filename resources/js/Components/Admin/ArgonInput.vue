<template>
  <div class="form-group">
    <div :class="hasIcon(icon)">
      <span v-if="iconDir === 'left'" class="input-group-text">
        <i :class="getIcon(icon)"></i>
      </span>
      <input
        :type="type"
        class="form-control "
        :class="getClasses()"
        :name="name"
        :id="id"
        :value="modelValue"
        :placeholder="placeholder"
        :isRequired="isRequired"
        @input="$emit('update:modelValue', $event.target.value)"
      />
      <div class="invalid-feedback" v-if="showError && errorText">
        {{ errorText }}
      </div>
      <span v-if="iconDir === 'right'" class="input-group-text">
        <i :class="getIcon(icon)"></i>
      </span>
    </div>
  </div>
</template>

<script>
export default {
  name: "argon-input",
  props: {
    modelValue: String,
    size: {
      type: String,
      default: "default",
    },
    valid: {
      type: Boolean,
      default: false,
    },
    showError: {
      type: Boolean,
      default: true,
    },
    errorText: String,
    icon: String,
    iconDir: String,
    name: String,
    id: String,
    placeholder: String,
    type: String,
    isRequired: Boolean,
  },
  methods: {
    getClasses() {
      console.log('getClasses');
      console.log(this.size);
      let sizeValue, isValidValue;

      sizeValue = this.size ? `form-control-${this.size}` : null;

      if (!this.valid && this.showError && this.errorText) {
        isValidValue = 'is-invalid'
      }

      return `${sizeValue} ${isValidValue}`;
    },
    getIcon: (icon) => (icon ? icon : null),
    hasIcon: (icon) => (icon ? "input-group" : null),
  },
};
</script>
