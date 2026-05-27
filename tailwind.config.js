/** @type {import('tailwindcss').Config} */
module.exports = {
  theme: {
    extend: {
      colors: {
        // Neutral colors
        neutral: {
          'primary-soft': '#f9fafb',
          'secondary-medium': '#f3f4f6',
        },
        // Default/Border colors
        default: '#e5e7eb',
        'default-medium': '#d1d5db',
        // Text colors
        heading: '#111827',
        body: '#6b7280',
        // Brand colors
        brand: '#3b82f6',
        'brand-soft': '#eff6ff',
        'brand-strong': '#1d4ed8',
        'brand-medium': '#93c5fd',
        'fg-brand': '#1F2937',
      },
      borderRadius: {
        base: '0.375rem',
        xs: '0.25rem',
      },
    },
  },
}
