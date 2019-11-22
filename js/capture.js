window.onload = function() {
  "use strict"
  const videoFrame = document.querySelector("video.camera-movie")
  const canvasFrame = document.querySelector("canvas.captured-frame")
  const imageFrame = document.querySelector("img.captured-image")
  const videoOptions = document.querySelector("select.video-devices")
  const captureButton = document.querySelector("a.capture-button")
  const saveButton = document.querySelector("a.save-button")
  const width = 640
  let height

  const setVideoFrame = () => {
    const selectedDeviceId = videoOptions.options[videoOptions.selectedIndex].value

    if (!selectedDeviceId) { return }

    const constraints = {
      audio: false,
      video: {
        width,
        deviceId: { exact: selectedDeviceId }
      }
    }

    console.log(constraints)
    navigator.mediaDevices.getUserMedia(constraints).then((mediaStream) => {
      console.log(mediaStream)
      videoFrame.srcObject = mediaStream
      videoFrame.play()
    })
  }

  videoFrame.addEventListener('canplay', (ev) => {
    height = videoFrame.videoHeight / (videoFrame.videoWidth/width)

    if (isNaN(height)) {
      height = width * 3 / 4
    }
  })

  navigator.mediaDevices.enumerateDevices().then(devices => {
    devices.forEach(device => {
      if (device.kind == "videoinput") {
        const optionNode = document.createElement('option')
        optionNode.appendChild(document.createTextNode(device.deviceId))
        optionNode.setAttribute('value', device.deviceId)

        videoOptions.appendChild(optionNode)
      }
    })
    setVideoFrame()
  })

  videoOptions.addEventListener('change', () => {
    setVideoFrame()
  }, false)

  captureButton.addEventListener('click', (e) => {
    e.preventDefault()
    const photoContext = canvasFrame.getContext('2d')
    canvasFrame.width = width
    canvasFrame.height = height
    photoContext.drawImage(videoFrame, 0, 0, width, height)

    let image = canvasFrame.toDataURL('image/png')
    image = image.replace(/^data:application\/octet-stream/, 'data:application/octet-stream;headers=Content-Disposition%3A%20attachment%3B%20filename=Canvas.png');
    saveButton.setAttribute('href', image)
  })

}
