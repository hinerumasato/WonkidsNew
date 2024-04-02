(async function() {
    const getCurrentHrefCategoryId = function () {
        const url = new URL(window.location.href);
        const result = url.searchParams.get('category');
        return result;
    }
    let url = `${APP_URL}:8000/api/v1/posts`;
    const categoryId = getCurrentHrefCategoryId();
    if(categoryId)
        url += `?categoryId=${categoryId}`
    const locale = document.querySelector('html').getAttribute('lang');
    const headers = new Headers();
    headers.append('locale', locale);
    const response = await fetch(url, {
        method: 'GET',
        headers: headers
    });
    const dataSource = await response.json();
    const dataTableLanguage = (locale != 'en') ? `https://cdn.datatables.net/plug-ins/2.0.3/i18n/${locale}.json` : '';
    const dataTable = new DataTable('#postsTable', {
        language: {
            url: dataTableLanguage
        },
        data: dataSource.data,
        order: [],
        columns: [
            {
                data: null,
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: null,
                render: function(data, type) {
                    return /*html*/`
                        <a href="/posts/${data.slug}">${data.title}</a>
                    `;
                }
            }, 

            //Can be use
            // {
            //     data: 'name',
            //     render: function(data, type) {
            //         return data;
            //     }
            // }
        ]
    });

    $('#postsTable thead').css('background', '#d0eddb');
})();