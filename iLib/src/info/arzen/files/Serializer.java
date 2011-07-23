package info.arzen.files;

import info.arzen.core.ADebug;

import java.io.ByteArrayInputStream;
import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutput;
import java.io.ObjectOutputStream;

public class Serializer {
	private static final String TAG = "BaseRequestListener";

	public static byte[] serialize(Object o) {
		ByteArrayOutputStream bos = new ByteArrayOutputStream();

		try {
			ObjectOutput out = new ObjectOutputStream(bos);
			out.writeObject(o);
			out.close();

			// Get the bytes of the serialized object
			byte[] buf = bos.toByteArray();

			return buf;
		} catch (IOException ioe) {
			ADebug.d(TAG, "error" + ioe.getMessage());

			return null;
		}
	}

	public static Object unserialize(byte[] b) {
		try {
			ObjectInputStream in = new ObjectInputStream(
					new ByteArrayInputStream(b));
			Object object = in.readObject();
			in.close();

			return object;
		} catch (ClassNotFoundException cnfe) {
			ADebug.d(TAG, "class not found error" + cnfe.getMessage());

			return null;
		} catch (IOException ioe) {
			ADebug.d(TAG, "io error" + ioe.getMessage());

			return null;
		}
	}

}
