// resources/js/api.js
const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

export async function http(url, options = {}) {
    const defaultHeaders = {
        'X-CSRF-TOKEN': csrfToken,
        'Accept': 'application/json',
    };

    // Si no enviamos FormData, aseguramos envío como JSON
    if (!(options.body instanceof FormData)) {
        defaultHeaders['Content-Type'] = 'application/json';
        if (options.body && typeof options.body === 'object') {
            options.body = JSON.stringify(options.body);
        }
    }

    const config = {
        ...options,
        headers: {
            ...defaultHeaders,
            ...options.headers
        }
    };

    const response = await fetch(url, config);
    const data = await response.json().catch(() => ({}));

    if (!response.ok) {
        throw { status: response.status, data };
    }

    return data;
}