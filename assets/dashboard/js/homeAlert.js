const flashdata = document
	.querySelector(".flash-data")
	.getAttribute("data-flashdata");
const title = document.querySelector(".flash-data").getAttribute("title");

if (flashdata) {
	Swal.fire({
		title: title,
		text: flashdata,
		icon: "success",
	});
}
