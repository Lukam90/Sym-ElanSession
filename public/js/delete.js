function openModal(id, type) {
    const link = `/${type}/delete/${id}`;

    const deleteModal = document.getElementById("delete-modal");
    const deleteLink = document.getElementById("delete-link");
    const close = document.getElementById("close");

    deleteModal.style.display = "block";
    deleteLink.href = link;

    close.addEventListener("click", () => {
        deleteModal.style.display = "none";
    });
}