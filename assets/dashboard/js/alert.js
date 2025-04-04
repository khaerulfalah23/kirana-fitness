const flashdata = document
	.querySelector(".flash-data")
	.getAttribute("data-flashdata");
const title = document.querySelector(".flash-data").getAttribute("title");

if (flashdata) {
	Swal.fire({
		title: title + " Data",
		text: flashdata,
		icon: "success",
	});
}

$(".button-delete").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");
	Swal.fire({
		title: "Are You Sure?",
		text: `Will Delete ${title} Data`,
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Hapus Data!",
	}).then((result) => {
		if (result.isConfirmed) {
			document.location.href = href;
		}
	});
});
