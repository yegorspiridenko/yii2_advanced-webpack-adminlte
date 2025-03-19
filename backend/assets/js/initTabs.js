function initTabs(tabKey) {
    const savedTab = localStorage.getItem(tabKey);

    if (savedTab) {
        $(`#project-tabs .nav-link[href="#${savedTab}"]`).tab('show');
    }

    $('#project-tabs .nav-link').on('click', function () {
        const tabValue = $(this).attr('href').substring(1);

        localStorage.setItem(tabKey, tabValue);
    });
}
